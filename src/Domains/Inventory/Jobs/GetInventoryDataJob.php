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
        $this->inventory = app(InventoryRepository::class);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = $this->inventory->all();
        $data['purchase_price'] = $data->sortByDesc('purchase_price')->take(4);
        return $data;
    }
}
