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
        $data['runningLoanCount'] = $runningLoan->sum('amount');
        $data['runningLoanPaid'] = $runningLoan->sum('amount_paid');
        $data['runningLoanOwing'] = $runningLoan->sum('amount') - $runningLoan->sum('amount_paid');
        $data['loans'] = $this->loan->getByCompany_id($this->companyId);
        $data['loanSources'] = (new ListLoanSourcesJob($this->companyId))->handle();
        $banks = (new GetBankAccountsJob($this->companyId))->handle();
        $banks->push( (new GetCashJob($this->companyId))->handle() );
        $banks[$banks->count() -1]->account_name = "Cash";
        $data['banks'] = $banks;

        return $data;
    }
}
