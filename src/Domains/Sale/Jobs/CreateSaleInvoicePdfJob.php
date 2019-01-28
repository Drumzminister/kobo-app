<?php

namespace App\Domains\Sale\Jobs;

use App\Data\Repositories\SaleRepository;
use Illuminate\Foundation\Bus\Dispatchable;
use Lucid\Foundation\QueueableJob;

class CreateSaleInvoicePdfJob extends QueueableJob
{
	use Dispatchable;
	private $sale;

	/**
	 * Create a new job instance.
	 *
	 * @param $sale
	 */
    public function __construct($sale)
    {
	    $this->sale = $sale;
	    $this->sale = app(SaleRepository::class);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
    }
}
