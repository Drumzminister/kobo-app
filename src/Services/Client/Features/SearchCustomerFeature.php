<?php

namespace App\Services\Client\Features;

use App\Domains\Customer\Jobs\SearchCustomerJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class SearchCustomerFeature extends Feature
{
    public function handle(Request $request)
    {
        return $this->run(SearchCustomerJob::class, ['param' => $request->get('param')]);
    }
}
