<?php

namespace App\Services\Client\Features;

use App\Domains\Vendor\Jobs\ActivateVendorJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ActivateVendorFeature extends Feature
{
    private $vendorId;

    public function __construct($vendorId)
    {
        $this->vendorId = $vendorId;
    }
    public function handle()
    {
        $added = $this->run(ActivateVendorJob::class, ['vendorId' => $this->vendorId]);

        if($added['status'] === "success")
            return response()->json(['message' => $added['message']]);

        return response()->json(['message' => 'error occured']);
    }
}
