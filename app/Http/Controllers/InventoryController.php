<?php

namespace Koboaccountant\Http\Controllers;

use Illuminate\Http\Request;
use Koboaccountant\Repositories\Opening\InventoryRepository;

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
}
