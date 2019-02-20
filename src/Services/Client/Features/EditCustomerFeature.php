<?php

namespace App\Services\Client\Features;

use App\Data\Repositories\CustomerRepository;
use App\Domains\Customer\Jobs\EditCustomerJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class EditCustomerFeature extends Feature
{
    private $customerId, $companyId, $customer;
    public function __construct($customerId)
    {
        $this->customerId = $customerId;
        $this->companyId = auth()->user()->company->id;
    }
    public function handle(Request $request)
    {
        return $this->run(EditCustomerJob::class, ['companyId' => $this->companyId, 'customerId' => $this->customerId, 'data' => $request->all()]);
    }
}
