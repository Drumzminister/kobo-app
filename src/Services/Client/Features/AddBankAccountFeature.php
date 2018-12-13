<?php

namespace App\Services\Client\Features;

use App\Domains\Bank\Jobs\AddBankAccountJob;
use App\Services\Client\Http\Requests\AddBankAccountRequest;
use Illuminate\Support\Facades\Auth;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class AddBankAccountFeature extends Feature
{
    public function handle(AddBankAccountRequest $request)
    {
    	$data = $request->all();
    	$data['user_id'] = Auth::user()->id;

		$isAdded = $this->run(AddBankAccountJob::class, ['data' => $data]);

		if ($isAdded === true) {
			// Bank Added successfully
			return [
				'status' => 'success',
				'message' => 'Bank details added successfully',
			];
		}

		return $isAdded;
    }
}
