<?php

namespace App\Domains\Expenses\Jobs;

use Lucid\Foundation\Job;

class GetExpensesPageDataJob extends Job
{
    private $companyId;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($companyId)
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return array
     */
    public function handle()
    {
        $data['expenses'] = (new ListAllCompaniesExpensesJob($this->companyId))->handle();

        return $data;
    }
}
