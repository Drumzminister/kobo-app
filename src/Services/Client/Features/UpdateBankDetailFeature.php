<?php

namespace App\Services\Client\Features;

use App\Domains\Bank\Jobs\UpdateBankDetailJob;
use App\Services\Client\Http\Requests\AddBankAccountRequest;
use Lucid\Foundation\Feature;
class UpdateBankDetailFeature extends Feature
{
	public function handle(AddBankAccountRequest $request)
	{
		$response = $this->run(UpdateBankDetailJob::class, ['data' => $request->all()]);

		return $response;
	}
}
