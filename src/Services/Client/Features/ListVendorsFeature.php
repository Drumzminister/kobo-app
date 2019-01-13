<?php

namespace App\Services\Client\Features;

use App\Domains\Vendor\Jobs\ListVendorsJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ListVendorsFeature extends Feature
{
    public function handle(Request $request)
    {
        return $this->run(ListVendorsJob::class);
    }
}
