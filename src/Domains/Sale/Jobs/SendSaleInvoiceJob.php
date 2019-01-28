<?php

namespace App\Domains\Sale\Jobs;

use App\Data\Repositories\SaleRepository;
use Illuminate\Foundation\Bus\Dispatchable;
use Lucid\Foundation\QueueableJob;

class SendSaleInvoiceJob extends QueueableJob
{
	use Dispatchable;
	/**
	 * @var string
	 */
	private $saleId;

	/**
	 * @var \Illuminate\Foundation\Application|SaleRepository
	 */
	private $sale;

	/**
	 * @var array
	 */
	private $data;

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
     *
     * @return void
     */
    public function handle()
    {
    	$sale = $this->sale->items;
    }
}
