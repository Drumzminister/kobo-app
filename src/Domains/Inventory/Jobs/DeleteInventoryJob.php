<?php

namespace App\Domains\Inventory\Jobs;

use App\Data\Repositories\InventoryItemRepository;
use App\Data\Repositories\InventoryRepository;
use Lucid\Foundation\Job;

class DeleteInventoryJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $inventoryId, $inventory, $inventoryItem;

    public function __construct($inventoryId)
    {
        $this->inventoryId = $inventoryId;
        $this->inventory = new InventoryRepository();
        $this->inventoryItem = new InventoryItemRepository();
    }

    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle()
    {
        $inventory = $this->inventory->find($this->inventoryId);
        $inventoryItem = $this->inventoryItem->deleteInventoryItem($inventory['id']);
        $this->inventory->remove($this->inventoryId);
        return true;
    }
}
