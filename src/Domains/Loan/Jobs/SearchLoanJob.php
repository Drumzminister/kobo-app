<?php

namespace App\Domains\Loan\Jobs;

use Lucid\Foundation\Job;

class SearchLoanJob extends Job
{
    private $source, $param;

    /**
     * Create a new job instance.
     *
     * @param $param
     */
    public function __construct($param)
    {

        $this->param = $param;
    }

    /**
     * Execute the job.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle()
    {

         return response()->json([
             'sources'  =>  ($this->param),
         ]);
    }
}
