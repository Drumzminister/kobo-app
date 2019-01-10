<?php

namespace App\Domains\Customer\Jobs;

use App\Data\Repositories\CustomerRepository;
use Lucid\Foundation\Job;

class SearchCustomerJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $search;

    public function __construct($data)
    {
        $this->data = $data;
        $this->search = app(CustomerRepository::class);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       return $this->search->findBy('first_name', $this->data);
    }
}
