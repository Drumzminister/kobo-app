<?php

namespace App\Services\Client\Features;

use App\Domains\Vendor\Jobs\UploadVendorImageJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class UploadVendorImageFeature extends Feature
{
    public function handle(Request $request)
    {
        return $this->run(UploadVendorImageJob::class, ['data' => $request->file('file')]);
    }
}
