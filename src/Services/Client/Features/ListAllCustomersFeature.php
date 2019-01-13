<?php

namespace App\Services\Client\Features;

use App\Domains\Customer\Jobs\GetCustomerDataJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ListAllCustomersFeature extends Feature
{
    public function handle(Request $request)
    {
        $data = $this->run(GetCustomerDataJob::class);
        return $this->run(new RespondWithViewJob('client::customer.view-customers', $data));
    }
}
