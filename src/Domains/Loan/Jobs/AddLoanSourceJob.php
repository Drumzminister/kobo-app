<?php

namespace App\Domains\Loan\Jobs;

use App\Data\Repositories\LoanSourceRepository;
use Lucid\Foundation\Job;

class AddLoanSourceJob extends Job
{
    private $data, $userId, $companyId, $source;

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
        $this->source = new LoanSourceRepository();
    }

    /**
     * Execute the job.
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function handle()
    {
        $source = $this->source->fillAndSave([
            'name'  =>  $this->data['name'],
            'user_id'   =>  $this->userId,
            'company_id'    =>  $this->companyId
        ]);
        return response()->json([
            'source'    =>  $source,
        ]);
    }
}
