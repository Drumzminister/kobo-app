<?php

namespace App\Domains\Expenses\Jobs;

use App\Domains\Bank\Jobs\GetBankAccountsJob;
use App\Domains\Banking\Jobs\GetCashJob;
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
        $this->companyId = $companyId;
    }

    /**
     * Execute the job.
     *
     * @return array
     * @throws \Exception
     */
    public function handle()
    {
        $data['expenses'] = (new ListAllCompaniesExpensesJob($this->companyId))->handle();
        $data['banks'] = $banks = (new GetBankAccountsJob($this->companyId))->handle();
        return $data;
    }
}
