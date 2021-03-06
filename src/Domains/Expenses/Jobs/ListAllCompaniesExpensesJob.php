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
    public function __construct($companyId, $paginated = false)
    {
        $this->companyId = $companyId;
        $this->paginated = $paginated;
        $this->expenses = new ExpenseRepository();
    }

    /**
     * Execute the job.
     *
     * @return Collection
     */
    public function handle()
    {
        if ($this->paginated)
            return $this->expenses->paginated($this->companyId, 10);
        return $this->expenses->getByCompany_Id($this->companyId);
    }
}
