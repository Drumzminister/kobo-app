<?php

namespace App\Services\Client\Http\Controllers;

use App\Services\Client\Features\AddInventoryFeature;
use App\Services\Client\Features\DeleteInventoryFeature;
use App\Services\Client\Features\ListInventoryFeature;
use App\Services\Client\Features\ShowSingleInventoryFeature;
use App\Services\Client\Features\ShowMultipleInventoryFeature;
use App\Services\Client\Features\UpdateInventoryFeature;
use App\Services\Client\Features\ShowInventoryFeature;
use Lucid\Foundation\Http\Controller;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showInventory()
    {
        return $this->serve(ShowInventoryFeature::class);
    }
    public function showSingleInventory()
    {
        return $this->serve(ShowSingleInventoryFeature::class);
    }
    public function showMultipleInventory()
    {
        return $this->serve(ShowMultipleInventoryFeature::class);
    }
    public function addInventory()
    {
        return $this->serve(AddInventoryFeature::class);
    }

    public function listInventory()
    {
        return $this->serve(ListInventoryFeature::class);
    }

    public function updateInventory()
    {
        return $this->serve(UpdateInventoryFeature::class);
    }

    public function deleteInventory($inventoryId)
    {
        return $this->serve(DeleteInventoryFeature::class, ['inventoryId' => $inventoryId]);
    }
}
