<?php

namespace App\Domains\Sale\Jobs;

use App\Data\Repositories\SaleItemRepository;
use App\Data\Repositories\SaleRepository;
use Koboaccountant\Traits\HelpsResponse;
use Lucid\Foundation\Job;

class AddSaleItemJob extends Job
{
	use HelpsResponse;
	/**
	 * @var \Illuminate\Foundation\Application|SaleItemRepository
	 */
	private $saleItem;
	/**
	 * @var array
	 */
	private $data;

	/**
	 * @var \Illuminate\Foundation\Application|SaleRepository
	 */
	private $sale;

	/**
	 * Create a new job instance.
	 *
	 * @param array $data
	 */
    public function __construct(array $data)
    {
        $this->saleItem = app(SaleItemRepository::class);
	    $this->data = $data;
	    $this->sale = app(SaleRepository::class);
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
    	$sale = $this->sale->findOnly('id', $this->data['sale_id']);

    	if ($sale && $sale->type === "published") {
    		return $this->createJobResponse('error', 'You cannot add Items to this sale because it\'s already published', $sale);
	    }

    	$item = $this->saleItem->fillAndSave($this->data);

	    return $item ?
		    $this->createJobResponse('success', 'Item Created', $item)
		    : $this->createJobResponse('error', 'Item Not Created', null);
    }
}
