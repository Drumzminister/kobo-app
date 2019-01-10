<?php

namespace App\Services\Client\Features;

use App\Domains\Customer\Jobs\GetCustomerDataJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class AllCustomerFeature extends Feature
{
    public function handle(Request $request)
    {
       return $this->run(GetCustomerDataJob::class);
    }
}
