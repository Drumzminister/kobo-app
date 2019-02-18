<?php

namespace App\Services\Client\Features;

use App\Domains\Vendor\Jobs\AddVendorJob;
use App\Services\Client\Http\Requests\AddVendorRequest;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class AddVendorFeature extends Feature
{
    public function handle(AddVendorRequest $request) //Remember to use AddVendorRequest
    {
        $added = $this->run(AddVendorJob::class, ['data' => $request->all(), 'user' => auth()->user()]);

        if($added)
            return response()->json(['message' => 'This vendor has successfully been added to your vendor list']);

        return response()->json(['error' => 'An error occurred']);

    }
}
