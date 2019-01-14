<?php

namespace App\Services\Client\Features;

use App\Domains\Vendor\Jobs\SearchVendorJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class SearchVendorFeature extends Feature
{
    public function handle(Request $request)
    {
        $data = $request->get('param');
        return $this->run(SearchVendorJob::class, ['data' => $data]);
    }
}
