<?php

namespace App\Domains\Sale\Jobs;

use App\Data\Repositories\SaleItemRepository;
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
	 * Create a new job instance.
	 *
	 * @param array $data
	 */
    public function __construct(array $data)
    {
        $this->saleItem = app(SaleItemRepository::class);
	    $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
    	$item = $this->saleItem->fillAndSave($this->data);

	    return $item ?
		    $this->createJobResponse('success', 'Item Created', $item)
		    : $this->createJobResponse('error', 'Item Not Created', null);
    }
}
