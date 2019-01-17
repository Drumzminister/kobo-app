<?php

namespace App\Domains\Inventory\Jobs;

use App\Data\Repositories\InventoryRepository;
use Koboaccountant\Models\Inventory;
use Lucid\Foundation\Job;

class GetInventoryDataJob extends Job
{
    private $inventory;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->inventory = new InventoryRepository();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data['inventories'] = $inventories = $this->inventory->getBy('user_id', auth()->id(), ['vendor']);
        $data['highest_purchase'] = $inventories->sortByDesc('purchase_price')->take(10);
        $data['highest_quantity'] = $inventories->sortByDesc('quantity')->take(10);
        return $data;
    }
}
