<?php

namespace App\Domains\Expenses\Jobs;

use App\Data\Repositories\ExpenseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Lucid\Foundation\Job;

class AddExpenseJob extends Job
{
    private $expense;
    private $data, $companyId, $userId;

    /**
     * Create a new job instance.
     *
     * @param $data
     * @param $userId
     * @param $companyId
     */
    public function __construct($data, $userId, $companyId)
    {
        $this->data = $data;
        $this->userId = $userId;
        $this->companyId = $companyId;
        $this->expense = new ExpenseRepository();
    }

    /**
     * Execute the job.
     *
     * @return null | Model
     * @throws \Exception
     */
    public function handle()
    {
        $expense = $this->expense->getByAttributes(['date' => $this->data['date'], 'details' => $this->data['details']]);
        if ($expense->count() === 0) {
            $this->data['user_id'] = $this->userId;
            $this->data['company_id'] = $this->companyId;
            $expense = $this->expense->fillAndSave($this->data);
        } else {
            $expense = $expense[0];
            $expense->update($this->data);
        }

        if (array_key_exists('paymentMethods', $this->data)) {
           (new PayExpenseJob($expense->id, $this->companyId, $this->data))->handle();
        }
        return $expense;

    }
}
