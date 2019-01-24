<?php

namespace App\Domains\Inventory\Jobs;

use App\Data\SaleItem;
use Koboaccountant\Traits\HelpsResponse;
use Lucid\Foundation\Job;

class DecrementItemInInventoryJob extends Job
{
	use HelpsResponse;

	/**
	 * @var
	 */
	private $sale;

	/**
	 * Create a new job instance.
	 *
	 * @param $sale
	 */
    public function __construct($sale)
    {
    	$this->sale = $sale;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $items = $this->sale->items;

        if ($this->sale->type !== 'published') {
        	return $this->createJobResponse('error', 'Drafted Sale cannot update Inventory', null);
        }

        $items->each(function (SaleItem $item) {
        	$inventory = $item->inventory;
        	$inventory->quantity = $inventory->quantity - $item->quantity;
        	$inventory->save();
        });

        return $this->createJobResponse('success', 'Inventory updated successfully', null);
    }
}
