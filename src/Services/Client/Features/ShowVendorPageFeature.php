<?php

namespace App\Services\Client\Features;

use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Vendor\Jobs\ListVendorsJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ShowVendorPageFeature extends Feature
{
    public function handle(Request $request)
    {
        $data = $this->run(ListVendorsJob::class);
        return $this->run(new RespondWithViewJob('client::vendor.vendors', $data));
    }
}
