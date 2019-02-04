<?php

namespace App\Domains\Inventory\Jobs;

use App\Data\Repositories\InventoryItemRepository;
use Lucid\Foundation\Job;

class GetInventoryItemDataJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $inventoryItem, $companyId;
    public function __construct()
    {
        $this->inventoryItem = new InventoryItemRepository();
        $this->companyId = auth()->user()->company->id;
    }

    /**
     * @return mixed
     */
    public function handle()
    {
        $data['inventory_items'] = $this->inventoryItem->getBy('company_id', $this->companyId);
        return $data;
    }
}
