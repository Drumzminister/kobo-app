<?php

namespace Koboaccountant\Http\Controllers;

use App\Data\Repositories\InventoryRepository as IRepository;
use Illuminate\Http\Request;
use Koboaccountant\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Koboaccountant\Repositories\Sales\SalesRepository;
use Koboaccountant\Repositories\Customer\CustomerRepository;
use Koboaccountant\Models\Inventory;
use Koboaccountant\Repositories\Inventory\InventoryRepository;
use Koboaccountant\Repositories\SalesChannel\SalesChannelRepository;
use Koboaccountant\Http\Requests\SalesRequest;
use Koboaccountant\Repositories\Sales\SalesTransactionRepository;

class SalesController extends Controller
{
    public function __construct(
        SalesChannelRepository $salesChannels,
        SalesRepository $sales,
        SalesTransactionRepository $trans,
        CustomerRepository $customer,
        IRepository $inventory
        )
    {
        $this->salesRepo = $sales;
        $this->customerRepo = $customer;
        $this->inventoryRepo = $inventory;
        $this->salesChannelRepo = $salesChannels;
        $this->salesTransactionRepo = $trans;
    }
    
    public function index()
    {
       $data['sales'] = $this->salesTransactionRepo->trans();
        return view('sales', $data);
    }
    
    public function sales()
    {
        $salesChannels = $this->salesChannelRepo->allSalesChannel();
        $customers = $this->customerRepo->allUserCustomers();
        $inventories = $this->inventoryRepo->getInventory();
        return view('addSales', compact('customers', 'inventories', 'salesChannels'));
    }

    public function create(Request $request)
    {
        $this->salesRepo->create($request->all());
        return 'Saved successfully';
    }
    
}
