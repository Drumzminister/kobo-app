<?php

namespace App\Domains\Inventory\Jobs;

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
    private $inventory;

    /**
     * AddInventoryJob constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
        $this->inventory = new InventoryRepository();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return $this->inventory->create($this->data);
    }
}
