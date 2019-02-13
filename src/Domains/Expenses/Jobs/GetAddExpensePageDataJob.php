<?php

namespace App\Domains\Expenses\Jobs;

use App\Domains\Bank\Jobs\GetBankAccountsJob;
use App\Domains\Banking\Jobs\GetCashJob;
use Lucid\Foundation\Job;

class GetAddExpensePageDataJob extends Job
{
    private $companyId;

    /**
     * Create a new job instance.
     *
     * @param $companyId
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
        $data['banks'] = $banks = (new GetBankAccountsJob($this->companyId))->handle();

        return $data;
    }
}
