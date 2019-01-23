<?php

namespace App\Domains\Sales\Jobs;

use App\Data\Repositories\SaleRepository;
use Lucid\Foundation\Job;

class GetSaleJob extends Job
{
	/**
	 * @var string
	 */
	private $saleId;

	/**
	 * @var \Illuminate\Foundation\Application|SaleRepository
	 */
	private $sale;

	/**
	 * Create a new job instance.
	 *
	 * @param string $saleId
	 */
    public function __construct(string $saleId)
    {
	    $this->saleId = $saleId;
	    $this->sale = app(SaleRepository::class);
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
    	return $this->sale->find($this->saleId);
    }
}
