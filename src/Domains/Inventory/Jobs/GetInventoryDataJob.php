<?php

namespace App\Domains\Inventory\Jobs;

use App\Data\Repositories\InventoryItemRepository;
use App\Data\Repositories\InventoryRepository;
use Koboaccountant\Http\Resources\InventoryCollection;
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
     * @return array
     */
    public function handle()
    {
        $inventories = $inventories = $this->inventory->fetchWithVendorAndInventory($this->companyId);//getBy('user_id', auth()->user()->id, ['vendor','inventoryItem']);
        $highest_purchase = $this->inventoryItem->topTenHighestAmountPurchases($this->companyId);
        $highest_quantity = $this->inventoryItem->topTenQuantityPurchases($this->companyId);

        $inventory = $this->inventory->getBy('company_id', auth()->user()->company->id);

        $firstInventory = $inventory->first();

        $dayInventories = $this->createInventoryCollectionsFromInventory($inventory->whereBetween('delivered_date', [now()->subDay(), now()]));
        $weekInventories = $this->createInventoryCollectionsFromInventory($inventory->whereBetween('delivered_date', [now()->subWeek(), now()]));
        $monthInventories = $this->createInventoryCollectionsFromInventory($inventory->whereBetween('delivered_date', [now()->subMonth(), now()]));
        $yearInventories = $this->createInventoryCollectionsFromInventory($inventory->whereBetween('delivered_date', [now()->subYear(), now()]));

        $inventory = $inventory->map(function($invent){
            return new InventoryCollection($invent);
        });

        return [
            'dayInventories' => $dayInventories,
            'weekInventories' => $weekInventories,
            'monthInventories' => $monthInventories,
            'yearInventories'  => $yearInventories,
            'inventory'     => $inventory,
            'startDate'     => $firstInventory ? $firstInventory->created_at : now()->toDateString(),
            'highest_purchase' => $highest_purchase,
            'highest_quantity' => $highest_quantity,
            'inventories'   => $inventories
        ];
    }


    protected function createInventoryCollectionsFromInventory($inventory)
    {
        return $inventory->map(function($inventory) {
            return new InventoryCollection($inventory);
        });
    }

    public function inventoryItem($inventoryId)
    {
        $inventoryItem = $this->inventoryItem->getBy('inventory_id', $inventoryId);
        return $inventoryItem;
    }

}
