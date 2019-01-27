<?php

namespace App\Domains\Inventory\Jobs;

use App\Data\Repositories\InventoryRepository;
use Lucid\Foundation\Job;

class DeleteInventoryJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $inventoryId, $inventory;

    public function __construct($inventoryId)
    {
        $this->inventoryId = $inventoryId;
        $this->inventory = new InventoryRepository();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->inventory->find($this->inventoryId);
        $this->inventory->remove($this->inventoryId);
        return true;
    }
}
