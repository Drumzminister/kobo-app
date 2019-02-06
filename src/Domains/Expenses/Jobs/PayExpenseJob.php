<?php

namespace App\Domains\Expenses\Jobs;

use App\Data\Repositories\ExpenseRepository;
use App\Domains\Banks\Jobs\DebitBanksJob;
use Lucid\Foundation\Job;

class PayExpenseJob extends Job
{
    private $expense;
    private $expenseId, $companyId, $data;

    /**
     * Create a new job instance.
     *
     * @param $expenseId
     * @param $companyId
     * @param $data
     */
    public function __construct($expenseId, $companyId, $data )
    {
        $this->data = $data;
        $this->expenseId = $expenseId;
        $this->companyId = $companyId;
        $this->expense = new ExpenseRepository();
    }

    /**
     * Execute the job.
     *
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Exception
     */
    public function handle()
    {
        $expense = $this->expense->find($this->expenseId);
        if ($expense->has_finished_payment) {
            throw new \Exception('This expense has already been paid for');
        }

        if (($expense->amount - $expense->amount_paid) > $this->data['amount']) {
            throw new \Exception('Amount is greater than amount payable');
        }

        $methods = json_decode( $this->data['paymentMethods'], true );
        $debit = (new DebitBanksJob($methods, $expense,$this->companyId))->handle();
        if ($debit->status !== 'success') {
            throw new \Exception($debit->message);
        }
        $expense->amount_paid += floatval($this->data['amount_paid']);
        $expense->has_finished_payment = floatval($expense->amount ) === $expense->amount_paid;

        $expense->save();
        return $expense;
    }
}
