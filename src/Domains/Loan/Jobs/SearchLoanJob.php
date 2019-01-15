<?php

namespace App\Domains\Loan\Jobs;

use App\Data\Repositories\LoanRepository;
use Illuminate\Support\Collection;
use Lucid\Foundation\Job;

class SearchLoanJob extends Job
{
    private $param, $companyId, $loan;

    /**
     * Create a new job instance.
     *
     * @param $param
     */
    public function __construct($param, $companyId)
    {
        $this->param = $param;
        $this->companyId = $companyId;
        $this->loan = new LoanRepository();
    }

    /**
     * Execute the job.
     *
     * @return Collection
     */
    public function handle()
    {
        $sources = (new SearchLoanSourcesJob($this->param, $this->companyId))->handle();
        $loans = [];
        foreach ($sources as $source) {
            array_push($loans, $this->loan->getByAttributes(['loan_source_id' => $source->id])->all() );
        }
        array_push($loans, $this->loan->searchByDescription($this->param, $this->companyId));
        array_push($loans, $this->loan->searchByStatus($this->param, $this->companyId));

        return collect($loans)->flatten();
    }
}
