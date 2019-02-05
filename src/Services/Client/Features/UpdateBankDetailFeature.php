<?php

namespace App\Services\Client\Features;

use App\Domains\Bank\Jobs\UpdateBankDetailJob;
use App\Services\Client\Http\Requests\AddBankAccountRequest;
use Lucid\Foundation\Feature;
class UpdateBankDetailFeature extends Feature
{
	private $detailId;

	public function __construct($detailId)
	{
		$this->detailId = $detailId;
	}

	public function handle(AddBankAccountRequest $request)
	{
		$isUpdated = $this->run(UpdateBankDetailJob::class, ['detailId' => $this->detailId, 'data' => $request->all()]);

		if ($isUpdated) {
			return [
				'status'    => 'success',
				'message'   => 'Bank details updated successfully',
			];
		}

		return [
			'status' => 'error',
			'message' => 'Unable to update bank details',
		];
	}
}
