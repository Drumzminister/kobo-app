<?php

namespace App\Services\Client\Features;

use App\Domains\Customer\Jobs\GetCustomerDataJob;
use App\Domains\Customer\Jobs\SearchCustomerJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class SearchCustomerFeature extends Feature
{
    public function handle(Request $request)
    {
        return $this->run(SearchCustomerJob::class, request()->all())
    }
}
