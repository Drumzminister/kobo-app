<?php

namespace App\Domains\Expenses\Jobs;

use App\Data\Repositories\ExpenseRepository;
use Illuminate\Support\Collection;
use Lucid\Foundation\Job;

class ListAllCompaniesExpensesJob extends Job
{
    private $companyId;
    private $expenses;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($companyId)
    {
        $this->companyId = $companyId;
        $this->expenses = new ExpenseRepository();
    }

    /**
     * Execute the job.
     *
     * @return Collection
     */
    public function handle()
    {
        return $this->expenses->getByAttributes(['company_id' => $this->companyId]);
    }
}
