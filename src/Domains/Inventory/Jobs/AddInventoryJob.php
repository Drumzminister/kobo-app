<?php

namespace App\Domains\Inventory\Jobs;

use App\Data\Repositories\InventoryItemRepository;
use App\Domains\Banking\Jobs\DebitAccountJob;
use http\Env\Request;
use App\Data\Repositories\InventoryRepository;
use Lucid\Foundation\Job;

class AddInventoryJob extends Job
{
    /**
     * @var array
     */
    private $data;
    /**
     * Create a new job instance.
     *
     */
    private $inventory, $inventoryItem, $userId, $companyId;

    /**
     * AddInventoryJob constructor.
     * @param array $data
     */
    public function __construct(array $data, $userId, $companyId)
    {
        $this->data = $data;
        $this->userId = $userId;
        $this->companyId = $companyId;
        $this->inventoryItem = app(InventoryItemRepository::class);
        $this->inventory = app(InventoryRepository::class);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->data['invoice_number'] = explode('-', $this->inventoryItem->generateUuid()->toString())[0];
        $this->data['user_id'] = $this->userId;
        $this->data['company_id'] = $this->companyId;
        $inventory = $this->inventory->fillAndSave($this->data);
        $methods = $this->data['banks'];
//        foreach ($methods as $method) {
//            (new DebitAccountJob($method, $this->companyId ))->handle();
//        }
        $items = $this->data['inventoryItem'];
        foreach($items as $key => $data)
        {
            $data['user_id'] = $this->userId;
            $data['company_id'] = $this->companyId;
            $data['inventory_id'] = $inventory->id;
            $this->inventoryItem->fillAndSave($data);
        }
        return true;
    }
}
