<?php

namespace App\Services\Client\Features;

use App\Domains\Customer\Jobs\AddCustomerJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class AddSingleCustomerFeature extends Feature
{
    public function handle(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->id();
        $data['company_id'] = auth()->user()->company->id;
        $added = $this->run(AddCustomerJob::class, ['data' => $data]);

        if($added)
            return response()->json(['message' => 'Customer added successfully.']);

        return response()->json(['error', 'Unable to add customer']);
    }
}
