<?php

namespace App\Services\Client\Features;

use App\Domains\Customer\Jobs\FindCustomerUsingIdJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class EditCustomerPageFeature extends Feature
{
    private $customerId;
    public function __construct($customerId)
    {
        $this->customerId = $customerId;
    }
    public function handle(Request $request)
    {
        $customer = $this->run(FindCustomerUsingIdJob::class, ['userId' => auth()->id(), 'customerId' => $this->customerId]);
        return $this->run(new RespondWithViewJob('client::customer.edit-customer', ['customer' => $customer]));
    }
}
