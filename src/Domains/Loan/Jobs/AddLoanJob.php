<?php

namespace App\Domains\Loan\Jobs;

use App\Data\Repositories\LoanRepository;
use App\Domains\Banks\Jobs\CreditBanksJob;
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
        $loan = $this->loan->fillAndSave($this->data);
        $account = json_decode($this->data['receivingAccount'], true);
        $credit = (new CreditBanksJob($account, $loan, $this->data['company_id']))->handle();
        if ($credit->status !== 'success') {
            $loan->delete();
            return response()->json([
                'message' => $credit->message
            ], 400);
        }
        return response()->json([
            'loan'  =>  $loan
        ], 201);
    }
}
