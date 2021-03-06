<?php

namespace App\Domains\Inventory\Jobs;

use App\Data\Repositories\InventoryRepository;
use Lucid\Foundation\Job;

class GetCompanyInventoriesJob extends Job
{
	/**
	 * @var string
	 */
	private $companyId;

	/**
	 * @var \Illuminate\Foundation\Application|InventoryRepository
	 */
	private $inventory;

	/**
	 * Create a new job instance.
	 *
	 * @param string $companyId
	 */
    public function __construct(string $companyId)
    {
	    $this->companyId = $companyId;
	    $this->inventory = app(InventoryRepository::class);
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
    	return $this->inventory->getAvailableInventories($this->companyId)
	                           ->pluck('inventoryItem')
	                           ->flatten(1)
	                           ->filter(function ($item) { return $item->quantity > 0; })
	                           ->values();
    }
}
