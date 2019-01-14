<?php

namespace App\Domains\Loan\Jobs;

use App\Data\Repositories\LoanRepository;
use Illuminate\Database\Eloquent\Model;
use Lucid\Foundation\Job;

class AddLoanJob extends Job
{
    private $loan, $data;

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
        $this->data['user_id'] = $userId;
        $this->data['company_id'] = $companyId;
        $this->loan = new LoanRepository();
    }

    /**
     * Execute the job.
     *
     * @return Model
     * @throws \Exception
     */
    public function handle()
    {
        return $this->loan->fillAndSave($this->data);
    }
}
