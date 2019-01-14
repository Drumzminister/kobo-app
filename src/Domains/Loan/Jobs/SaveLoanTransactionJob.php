<?php

namespace App\Domains\Loan\Jobs;

use App\Data\Repositories\LoanTransaction;
use Lucid\Foundation\Job;

class SaveLoanTransactionJob extends Job
{
    private $transaction, $data, $loanId, $companyId;
    const IS_PROCESSED = true;
    /**
     * Create a new job instance.
     *
     * @param $data
     * @param $loanId
     * @param $companyId
     */
    public function __construct($data, $loanId, $companyId)
    {
        $this->data = $data;
        $this->loanId = $loanId;
        $this->companyId = $companyId;
        $this->transaction = new LoanTransaction();
    }

    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle()
    {
        $data = [
            'amount' => $this->data['amount'],
            'loan_id'=> $this->loanId,
            'company_id' => $this->companyId,
            'isProcessed' => self::IS_PROCESSED
        ];
        return $this->transaction->saveTransaction($data);
    }
}
