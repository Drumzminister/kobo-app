<?php

namespace App\Services\Client\Features;

use App\Domains\Bank\Jobs\AddBankAccountJob;
use App\Services\Client\Http\Requests\AddBankAccountRequest;
use Illuminate\Support\Facades\Auth;
use Lucid\Foundation\Feature;

class AddBankAccountFeature extends Feature
{
    public function handle(AddBankAccountRequest $request)
    {
    	$data = $request->all();
		$response = $this->run(AddBankAccountJob::class, ['companyId' => Auth::user()->getUserCompany()->id, 'data' => $data]);

		if ($response->status === "success") {
			return $response;
		}

		return $response;
    }
}
