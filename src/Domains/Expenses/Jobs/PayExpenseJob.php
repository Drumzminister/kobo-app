<?php

namespace App\Domains\Expenses\Jobs;

use App\Data\Repositories\ExpenseRepository;
use App\Domains\Banking\Jobs\DebitAccountJob;
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
        if ($expense->hasPaid) {
            throw new \Exception('This expense has already been paid for');
        }
        $methods = json_decode( $this->data['paymentMethods'], true );
        foreach($methods as $method) {
            (new DebitAccountJob($method, $this->companyId))->handle();
        }
        $expense->hasPaid = true;
        $expense->save();
        return $expense;
    }
}
