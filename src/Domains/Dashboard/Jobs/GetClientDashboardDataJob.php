<?php

namespace App\Domains\Dashboard\Jobs;

use App\Data\Repositories\ExpenseRepository;
use App\Data\Repositories\SaleRepository;
use App\Domains\Transaction\Jobs\GetDashboardTransactionDataJob;
use Koboaccountant\Models\User;
use Lucid\Foundation\Job;

class GetClientDashboardDataJob extends Job
{
	/**
	 * Sale Repo
	 *
	 * @var \Illuminate\Foundation\Application|SaleRepository
	 */
	private $sale;

	/**
	 * @var \Illuminate\Foundation\Application|ExpenseRepository
	 */
	private $expense;

    private $user;

    /**
     * Create a new job instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
    	$this->sale = app(SaleRepository::class);
    	$this->expense = app(ExpenseRepository::class);
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
    	$sales = $this->sale->all();
    	$expenses = $this->expense->all();
    	$totalSales = $sales->pluck('total_amount')->sum();
    	$totalExpenses = $expenses->pluck('amount')->sum();
        $transactionsData = (new GetDashboardTransactionDataJob($this->user))->handle();
    	return array_merge($transactionsData, ['totalExpenses' => $totalExpenses, 'totalSales' => $totalSales]);
        // Get Total Sales, Total Expenses, Total Profit
    }
}
