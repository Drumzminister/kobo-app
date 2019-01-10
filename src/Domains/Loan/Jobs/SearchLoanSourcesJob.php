<?php

namespace App\Domains\Loan\Jobs;

use App\Data\Repositories\LoanSourceRepository;
use Lucid\Foundation\Job;

class SearchLoanSourcesJob extends Job
{
    private $param, $source;

    /**
     * Create a new job instance.
     *
     * @param $param
     */
    public function __construct($param)
    {
        $this->param = $param;
        $this->source = new LoanSourceRepository();
    }

    /**
     * Execute the job.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle()
    {
        return response()->json([
            'sources'   =>  $this->source->searchByName($this->param)
        ]);
    }
}
