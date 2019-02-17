<?php

namespace App\Domains\Customer\Jobs;

use App\Data\Repositories\CustomerRepository;
use Lucid\Foundation\Job;

class AddCustomerJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $data, $customer;
    public function __construct(array $data)
    {
        $this->data = $data;
        $this->customer = app(CustomerRepository::class);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $store = $this->customer->fillAndSave($this->data);
        return response()->json(['data' => $store]);
    }
}
