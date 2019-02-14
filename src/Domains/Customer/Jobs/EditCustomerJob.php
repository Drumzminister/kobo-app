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
    private $customerId, $companyId, $customer;

    public function __construct($customerId, $companyId)
    {
        $this->customerId = $customerId;
        $this->companyId = $companyId;
        $this->customer = new CustomerRepository();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->customer->findBy('id', $this->companyId);
        $this->customer->fillAndSave();
    }
}
