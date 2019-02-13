<?php

namespace App\Domains\Expenses\Jobs;

use App\Data\Repositories\ExpenseRepository;
use App\Domains\Bank\Jobs\GetBankAccountsJob;
use App\Domains\Banking\Jobs\GetCashJob;
use Lucid\Foundation\Job;

class GetExpensesPageDataJob extends Job
{
    private $expense;
    private $companyId;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($companyId)
    {
        $this->expense = new ExpenseRepository();
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
        $expenses       = (new ListAllCompaniesExpensesJob($this->companyId))->handle();
        $latest         = $this->expense->getLatest($this->companyId);
        $banks          = (new GetBankAccountsJob($this->companyId))->handle();

        $dayExpenses    = $expenses->whereBetween('created_at', [now()->subDay(), now()]);
        $weekExpenses   = $expenses->whereBetween('created_at', [now()->subWeek(), now()]);
        $monthExpenses  = $expenses->whereBetween('created_at', [now()->subMonth(), now()]);
        $yearExpenses   = $expenses->whereBetween('created_at', [now()->subYear(), now()]);
        $startDate      = $expenses->first()->date ?? now();

        return [
            'expenses'  => $expenses,
            'latest'    => $latest,
            'banks'     => $banks,
            'dayExpenses'   => $dayExpenses,
            'monthExpenses' => $monthExpenses,
            'weekExpenses'  => $weekExpenses,
            'yearExpenses'  => $yearExpenses,
            'startDate'     => $startDate
        ];
    }
}
