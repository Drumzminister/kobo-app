<?php

namespace App\Services\Client\Features;

use App\Domains\Vendor\Jobs\AddVendorJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class AddVendorFeature extends Feature
{
    public function handle(Request $request)
    {
        $data = $request->all();
        $data['company_id'] = auth()->user()->company->id;
        $added = $this->run(AddVendorJob::class, ['data' => $data]);
        if($added)
            return response()->json(['message' => 'Vendor Added successfully']);

        return response()->json(['message' => 'An error occurred']);

    }
}
