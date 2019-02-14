<?php

namespace App\Domains\Dashboard\Jobs;

use App\Data\Repositories\ExpenseRepository;
use App\Data\Repositories\SaleRepository;
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

	/**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
    	$this->sale = app(SaleRepository::class);
    	$this->expense = app(ExpenseRepository::class);
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

    	return ['totalExpenses' => $totalExpenses, 'totalSales' => $totalSales];
        // Get Total Sales, Total Expenses, Total Profit
    }
}
