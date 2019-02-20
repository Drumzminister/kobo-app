<?php

namespace App\Services\Client\Features;

use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Services\Client\Http\Requests\AddCustomerRequest;
use Lucid\Foundation\Feature;

class AddCustomerFeature extends Feature
{
    public function handle(AddCustomerRequest $request)
    {
        return $this->run(new RespondWithViewJob('client::customer.add-customers'));
    }
}
