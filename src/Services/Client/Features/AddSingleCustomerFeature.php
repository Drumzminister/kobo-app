<?php

namespace App\Services\Client\Features;

use App\Domains\Customer\Jobs\AddCustomerJob;
use App\Services\Client\Http\Requests\AddCustomerRequest;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class AddSingleCustomerFeature extends Feature
{
    public function handle(AddCustomerRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->id();
        $data['company_id'] = auth()->user()->company->id;
        $customer = $this->run(AddCustomerJob::class, ['data' => $data]);

        if($customer)
            return response()->json(['data' => $customer]);

        return response()->json(['error', 'Unable to add customer']);
    }
}
