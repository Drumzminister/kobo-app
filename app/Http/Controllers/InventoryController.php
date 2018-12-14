<?php

namespace Koboaccountant\Http\Controllers;

use Illuminate\Http\Request;
use Koboaccountant\Repositories\Inventory\InventoryRepository;

class InventoryController extends Controller
{
    public function __construct(InventoryRepository $inventory)
    {
        $this->inventoryRepo = $inventory;
    }

    public function index()
    {
        return view('inventory');
    }

    public function view()
    {
        return view('view-inventory');
    }

    public function multiView()
    {
        return view('multi-inventory');
    }

    public function singleView()
    {
        return view('single-inventory');
    }

    public function getInventory()
    {
        return $this->inventoryRepo->getInventory()->get();
    }

    public function checker()
    {
        $id = "06cd05bf-d770-32d8-9978-c97678fd7fc2";

        $data = $this->inventoryRepo
            ->reduceQuantity($id, 20);
        return response()->json($data);
    }
}
