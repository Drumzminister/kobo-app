<?php

namespace App\Domains\Customer\Jobs;

use App\Data\Repositories\CustomerRepository;
use Lucid\Foundation\Job;

/**
 * @property  customerId
 */
class GetCustomerDataJob extends Job
{
    private $customer;
    private $companyId;

    /**
     * Create a new job instance.
     *
     * @param $companyId
     */
    public function __construct($companyId)
    {
        $this->customer = new CustomerRepository();
        $this->companyId = $companyId;
    }

    /**1
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data['customers'] = $this->customer->latest($this->companyId);
        return $data;
    }
}
