<?php

namespace App\Domains\Loan\Jobs;

use App\Data\Repositories\LoanPaymentRepository;
use App\Data\Repositories\LoanRepository;
use App\Domains\Banking\Jobs\DebitAccountJob;
use Lucid\Foundation\Job;

class PayLoanJob extends Job
{
    private $loan, $loanPayment;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($loanId, $data, $companyId)
    {
        $this->loan = new LoanRepository();
        $this->companyId = $companyId;
        $this->loanPayment = new LoanPaymentRepository();
        $this->loanId = $loanId;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Exception
     */
    public function handle()
    {
        $loan = $this->loan->find($this->loanId);
        $loanPayable = ($loan->amount * $loan->interest /100) + $loan->amount;
        if ($loan->amount_paid === $loanPayable ) {
            throw new \Exception('Payment has already been competed');
        }
        $methods = json_decode( $this->data['paymentMethods'], true );
        foreach ($methods as $method) {
            (new DebitAccountJob($method, $this->companyId ))->handle();
        }

        $loan->amount_paid += floatval($this->data['amount']);
        if (floatval($loanPayable - $loan->amount_paid) === floatval($this->data['amount'])) {
            $loan->status = 'completed';
        }
        $loan->save();

        $payment = $this->loanPayment->fillAndSave([
            'loan_id'   =>  $this->loanId,
            'amount'    =>  $this->data['amount'],
            'balance'    => $loanPayable - $loan->amount_paid,
        ]);
        return $payment;
    }
}
