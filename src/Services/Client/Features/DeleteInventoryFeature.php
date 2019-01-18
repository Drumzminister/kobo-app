<?php

namespace App\Services\Client\Features;

use App\Data\Repositories\InventoryRepository;
use App\Domains\Inventory\Jobs\DeleteInventoryJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class DeleteInventoryFeature extends Feature
{
    private $inventoryId, $inventory;

    public function __construct($inventoryId)
    {
        $this->inventoryId = $inventoryId;
    }
    public function handle()
    {
        $deleted = $this->run(DeleteInventoryJob::class, ['inventoryId' => $this->inventoryId]);

        if($deleted)
            return response()->json(['message' => 'Inventory deleted successfully']);

        return response()->json(['error' => 'Error deleting inventory']);
    }
}
