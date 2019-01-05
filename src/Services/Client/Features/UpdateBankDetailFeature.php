<?php

namespace App\Services\Client\Features;

use App\Domains\Bank\Jobs\UpdateBankDetailJob;
use App\Services\Client\Http\Requests\AddBankAccountRequest;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

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
			// This could be an alert
			return [
				'status' => 'success',
				'message' => 'Bank details updated successfully',
			];
		}

		return [
			'status' => 'error',
			'message' => 'Unable to update bank details',
		];
	}
}
