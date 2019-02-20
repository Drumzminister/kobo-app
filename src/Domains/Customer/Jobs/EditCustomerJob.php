<?php

namespace App\Domains\Customer\Jobs;

use App\Data\Repositories\CustomerRepository;
use Lucid\Foundation\Job;

class EditCustomerJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $customerId, $companyId, $customer, $data;

    public function __construct($customerId, $companyId, $data)
    {
        $this->customerId = $customerId;
        $this->companyId = $companyId;
        $this->customer = new CustomerRepository();
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $customer = $this->customer->update($this->data, $this->customerId);
        return $customer;
    }
}
