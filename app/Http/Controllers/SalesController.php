<?php

namespace Koboaccountant\Http\Controllers;

use Illuminate\Http\Request;
use Koboaccountant\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Koboaccountant\Repositories\Sales\SalesRepository;
use Koboaccountant\Repositories\Customer\CustomerRepository;
use Koboaccountant\Models\Inventory;
use Koboaccountant\Repositories\Inventory\InventoryRepository;


class SalesController extends Controller
{
    public function __construct(
        SalesRepository $sales,
        CustomerRepository $customer,
        InventoryRepository $inventory
        )
    {
        $this->salesRepo = $sales;
        $this->customerRepo = $customer;
        $this->inventoryRepo = $inventory;
    }
    
    public function index()
    {
        return view('sales');
    }
    
    public function sales()
    {
        $customers = $this->customerRepo->allUserCustomers()->get();
        $inventories = $this->inventoryRepo->allUserInventory()->get();
        $salesChannel = $this->salesRepo->getUserSalesChannel()->get();
        return view('addSales', compact('customers', 'inventories','salesChannel'));
    }

    public function create(Request $request)
    {
        //Validations
        $this->salesRepo->create($request->all());
    }
}
