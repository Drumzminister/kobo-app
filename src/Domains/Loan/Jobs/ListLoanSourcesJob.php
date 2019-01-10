<?php

namespace App\Domains\Loan\Jobs;

use App\Data\Repositories\LoanSourceRepository;
use Lucid\Foundation\Job;

class ListLoanSourcesJob extends Job
{
    private $source, $companyId;

    /**
     * Create a new job instance.
     *
     * @param $companyId
     */
    public function __construct($companyId)
    {
        $this->companyId = $companyId;
        $this->source = new LoanSourceRepository();
    }

    /**
     * Execute the job.
     *
     * @return \Illuminate\Support\Collection
     */
    public function handle()
    {
        return $this->source->getBy('company_id', $this->companyId);
    }
}
