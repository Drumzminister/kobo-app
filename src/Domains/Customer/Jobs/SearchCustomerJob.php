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
    private $param;

    public function __construct($param)
    {
        $this->param = $param;
        $this->search = new CustomerRepository();
    }

    /**
     * Execute the job.
     *
     * @return \Illuminate\Support\Collection
     */
    public function handle()
    {
        $data = collect([]);
        $data->push($this->search->searchByFirst_name($this->param));
        $data->push($this->search->searchByLast_name($this->param));
        $data->push($this->search->searchByPhone($this->param));
        $data->push($this->search->searchByEmail($this->param));
        $data->push($this->search->searchByWebsite($this->param));
        return collect(array_values($data->collapse()->unique('id')->all()));
    }
}
