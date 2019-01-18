<?php

namespace App\Services\Client\Features;

use App\Domains\Vendor\Jobs\AddVendorJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class AddVendorFeature extends Feature
{
    public function handle(Request $request)
    {
        $added = $this->run(AddVendorJob::class, ['data' => $request->all(), 'user' => auth()->user()]);

        if($added)
            return response()->json(['message' => 'Vendor Added successfully']);

        return response()->json(['message' => 'An error occurred']);

    }
}
