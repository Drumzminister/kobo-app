<?php

namespace Koboaccountant\Http\Controllers;

use Illuminate\Http\Request;
use Koboaccountant\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Koboaccountant\Repositories\Sales\SalesRepository;
use Koboaccountant\Repositories\Customer\CustomerRepository;
use Koboaccountant\Models\Inventory;
use Koboaccountant\Repositories\Inventory\InventoryRepository;
use Koboaccountant\Repositories\SalesChannel\SalesChannelRepository;
use Koboaccountant\Http\Requests\SalesRequest;

class SalesController extends Controller
{
    public function __construct(
        SalesChannelRepository $salesChannels,
        SalesRepository $sales,
        CustomerRepository $customer,
        InventoryRepository $inventory
        )
    {
        $this->salesRepo = $sales;
        $this->customerRepo = $customer;
        $this->inventoryRepo = $inventory;
        $this->salesChannelRepo = $salesChannels;
    }
    
    public function index()
    {
        return view('sales');
    }
    
    public function sales()
    {
        $salesChannels = $this->salesChannelRepo->allSalesChannel()->get();
        $customers = $this->customerRepo->allUserCustomers()->get();
        $inventories = $this->inventoryRepo->getInventory()->get();
        return view('addSales', compact('customers', 'inventories', 'salesChannels'));
    }

    public function create(SalesRequest $sales)
    {
        $this->salesRepo->create($request->all());
    }
}
