<?php

namespace App\Domains\Sale\Jobs;

use App\Data\Repositories\TaxRepository;
use Lucid\Foundation\Job;

class GetAllTaxJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $tax;
    public function __construct()
    {
        $this->tax = new TaxRepository();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return $this->tax->all();
    }
}
