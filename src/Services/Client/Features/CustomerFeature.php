<?php

namespace App\Services\Client\Features;

use App\Domains\Customer\Jobs\GetCustomerDataJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class CustomerFeature extends Feature
{
    public function handle(Request $request)
    {
        $data = $this->run(GetCustomerDataJob::class, ['companyId' => auth()->user()->company->id]);
        return $this->run(new RespondWithViewJob('client::customer.customers', $data));
    }
}
