<?php

namespace App\Domains\Budget\Jobs;

use App\Data\Repositories\BudgetRepository;
use Lucid\Foundation\Job;

class GetBudgetJob extends Job
{
	/**
	 * @var string
	 */
	private $budgetId;

	/**
	 * @var \Illuminate\Foundation\Application|BudgetRepository
	 */
	private $budget;

	/**
	 * Create a new job instance.
	 *
	 * @param string $budgetId
	 */
    public function __construct(string $budgetId)
    {
	    $this->budgetId = $budgetId;
	    $this->budget = app(BudgetRepository::class);
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        return $this->budget->find($this->budgetId);
    }
}
