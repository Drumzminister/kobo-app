<?php

namespace App\Domains\Expenses\Jobs;

use App\Data\Repositories\ExpenseRepository;
use Illuminate\Support\Collection;
use Lucid\Foundation\Job;

class SearchExpensesJob extends Job
{
    private $companyId;
    private $expenses;
    private $param;

    /**
     * Create a new job instance.
     *
     * @param $companyId
     * @param $param
     */
    public function __construct($companyId, $param)
    {
        $this->param = $param;
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
        return $this->expenses->searchByDetails($this->param, $this->companyId);
    }
}
