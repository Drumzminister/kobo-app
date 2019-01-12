<?php

namespace App\Domains\Loan\Jobs;

use App\Data\Repositories\LoanRepository;
use Illuminate\Support\Collection;
use Lucid\Foundation\Job;

class ListLoanJob extends Job
{
    private $companyId, $loan;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($companyId)
    {
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
        return $this->loan->getByCompany_id($this->companyId);
    }
}
