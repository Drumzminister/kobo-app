<?php

namespace App\Domains\Customer\Jobs;

use App\Data\Repositories\CustomerRepository;
use Lucid\Foundation\Job;

class DeleteCustomerJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $data, $customer;
    public function __construct($customerId)
    {
        $this->data = $customerId;
        $this->customer = new CustomerRepository();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->customer->find($this->data)->first();
        $this->customer->remove($this->data);
        return true;
    }
}
