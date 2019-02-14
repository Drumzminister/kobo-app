<?php

namespace App\Domains\Customer\Jobs;

use App\Data\Repositories\CustomerRepository;
use Lucid\Foundation\Job;

class FindCustomerUsingIdJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $userId, $customerId, $customer;

    public function __construct($userId, $customerId)
    {
        $this->customerId = $customerId;
        $this->userId = $userId;
        $this->customer = new CustomerRepository();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = $this->customer->findBy('id', $this->customerId);
        return $data;
    }
}
