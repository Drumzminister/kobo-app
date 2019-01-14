<?php

namespace App\Domains\Loan\Jobs;

use App\Data\Repositories\LoanPaymentRepository;
use Lucid\Foundation\Job;

class ListLoanPaymentsJob extends Job
{
    private $loanPayment;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($loanId)
    {
        $this->loanId = $loanId;
        $this->loanPayment = new LoanPaymentRepository();
    }

    /**
     * Execute the job.
     *
     * @return \Illuminate\Support\Collection
     */
    public function handle()
    {
        return $this->loanPayment->getByAttributes(['loan_id' => $this->loanId]);
    }
}
