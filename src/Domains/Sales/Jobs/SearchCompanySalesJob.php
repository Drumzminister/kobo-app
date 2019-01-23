<?php

namespace App\Domains\Sales\Jobs;

use App\Data\Repositories\SaleRepository;
use Lucid\Foundation\Job;

class SearchCompanySalesJob extends Job
{
	/**
	 * @var string
	 */
	private $companyId;

	/**
	 * @var \Illuminate\Foundation\Application|SaleRepository
	 */
	private $sale;

	/**
	 * Create a new job instance.
	 *
	 * @param string $companyId
	 */
    public function __construct(string $companyId)
    {
	    $this->companyId = $companyId;
	    $this->sale = app(SaleRepository::class);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
    	$sales = $this->sale->searchBy();
    }
}
