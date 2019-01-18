<?php

namespace App\Domains\Customer\Jobs;

use App\Data\Repositories\CustomerRepository;
use Lucid\Foundation\Job;

class GetCustomerDataJob extends Job
{
    private $customer;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->customer = app(CustomerRepository::class);
    }

    /**1
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data['total_customers'] = $this->customer->count();
        $data['customers'] = $this->customer->userAll();
        $data['all_customers'] = $this->customer->page();
        return $data;
    }
}
