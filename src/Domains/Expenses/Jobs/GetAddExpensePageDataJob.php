<?php

namespace App\Domains\Expenses\Jobs;

use App\Domains\Bank\Jobs\GetBankAccountsJob;
use App\Domains\Banking\Jobs\GetCashJob;
use Lucid\Foundation\Job;

class GetAddExpensePageDataJob extends Job
{
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
        $data = [];
        $banks = (new GetBankAccountsJob($this->companyId))->handle();
        $banks->push( (new GetCashJob($this->companyId))->handle() );
        $banks[$banks->count() -1]->account_name = "Cash";
        $data['banks'] = $banks;

        return $data;
    }
}
