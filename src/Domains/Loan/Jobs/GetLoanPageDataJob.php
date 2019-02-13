<?php

namespace App\Domains\Loan\Jobs;

use App\Data\Repositories\LoanRepository;
use App\Domains\Bank\Jobs\GetBankAccountsJob;
use App\Domains\Banking\Jobs\GetCashJob;
use App\Domains\Banking\Jobs\ListPaymentMethodsJob;
use Lucid\Foundation\Job;

class GetLoanPageDataJob extends Job
{
    private $companyId, $loan;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($companyId)
    {
        $this->companyId = $companyId;
        $this->loan = new LoanRepository();
    }

    /**
     * Execute the job.
     *
     * @return array
     */
    public function handle()
    {
        
        $runningLoan = $this->loan->getByAttributes(['company_id' => $this->companyId, 'status' => 'running']);
        $runningLoanCount = $runningLoan->sum('amount');
        $runningLoanPaid = $runningLoan->sum('amount_paid');
        $runningLoanOwing = $runningLoan->sum('amount') - $runningLoan->sum('amount_paid');
        $loans = $this->loan->getByCompany_id($this->companyId);
        $loanSources = (new ListLoanSourcesJob($this->companyId))->handle();
        $banks = (new GetBankAccountsJob($this->companyId))->handle();

        $dayLoans   = $loans->whereBetween('created_at', [now()->subDay(), now()]);
        $weekLoans  = $loans->whereBetween('created_at', [now()->subWeek(), now()]);
        $monthLoans = $loans->whereBetween('created_at', [now()->subMonth(), now()]);
        $yearLoans  = $loans->whereBetween('created_at', [now()->subYear(), now()]);
        $startDate  = $loans->first()->created_at ?? now();

        return [
            'runningLoan'       => $runningLoan,
            'runningLoanOwing'  => $runningLoanOwing,
            'runningLoanPaid'   => $runningLoanPaid,
            'runningLoanCount'  => $runningLoanCount,
            'loanSources'       => $loanSources,
            'loans'             => $loans,
            'banks'             => $banks,
            'yearLoans'         => $yearLoans,
            'dayLoans'          => $dayLoans,
            'weekLoans'         => $weekLoans,
            'monthLoans'        => $monthLoans,
            'startDate'         => $startDate
        ];
    }
}
