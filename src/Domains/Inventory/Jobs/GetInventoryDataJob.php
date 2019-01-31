<?php

namespace App\Domains\Inventory\Jobs;

use App\Data\Repositories\InventoryItemRepository;
use App\Data\Repositories\InventoryRepository;
use Koboaccountant\Models\Inventory;
use Lucid\Foundation\Job;

class GetInventoryDataJob extends Job
{
    private $inventory, $inventoryItem, $companyId;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->inventory = new InventoryRepository();
        $this->inventoryItem = new InventoryItemRepository();
        $this->companyId = auth()->user()->company->id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data['inventories'] = $inventories = $this->inventory->getBy('user_id', auth()->id(), ['vendor','inventoryItem']);
        $data['highest_purchase'] = $this->inventoryItem->topTenHighestAmountPurchases($this->companyId);
        $data['highest_quantity'] = $this->inventoryItem->topTenQuantityPurchases($this->companyId);
        return $data;
    }

    private function getSum($inventoryId) {
        $inventory = $this->inventory->getBy('inventory_id', $inventoryId);
        return $inventory;
    }
    public function inventoryItem($inventoryId)
    {
        $inventory = $this->inventoryItem->all();
        $inventoryItem = $inventory->getBy('inventory_id', $inventoryId);
        return $inventoryItem;
    }

}
