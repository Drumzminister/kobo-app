<?php

namespace Koboaccountant\Repositories\Sales;

use Koboaccountant\Repositories\BaseRepository;
use Koboaccountant\Models\SalesChannel;
use Koboaccountant\Models\Sales;
// use Koboaccountant\Reopsitories\Inventory\InventoryRepository;
use Koboaccountant\Notifications\MadeSales;
use Auth;
use Koboaccountant\Repositories\Inventory\InventoryRepository;
use Koboaccountant\Models\Company;
use Koboaccountant\Models\Customer;

class SalesRepository extends BaseRepository
{
    public function __construct(
        SalesChannel $salesChannel,
        Sales $sale,
        InventoryRepository $inventory,
        Company $company,
        Customer $customer
        ) {
        $this->salesInventory = $inventory;
        $this->salesModel = $sale;
        $this->saleschannelModel = $salesChannel;
        $this->companyModel = $company;
        $this->customerModel = $customer;
    }

    public function addChannel($data)
    {
        $channel = new SalesChannel();
        $channel->name = $data['name'];

        $channel->save();

        return true;
    }

    public function create($data)
    {
        //Check for product availability
        if ($this->inventoryRepo->checkAvailability($data['inventory_id'], $data['quantity'])) {
            //Reduce Inventory
            $this->inventoryRepo->reduceQuantity($data['inventory_id'], $data['quantity']);
            $sales = new Sales();
            $sales->id = $this->generateUuid();
            //Upload any Image
            $sales->attachment = $data['attachment'];
            $sales->customer_id = $data['customer_id'];
            $sales->inventory_id = $data['inventory_id'];
            $sales->sales_date = $data['sales_date'];
            $sales->tax = $data['tax'];
            $sales->quantity = $data['quantity'];
            $sales->save();

            //notifyAccountant
            $accountant = Auth::user()->company->accountant;
            $accountant->notify(new MadeSales($sales->id));

            /*
                TODO logic for the debtor
            */
            return true;
        } else {
            return false;
        }
    }

    public function update($data)
    {
        $sales = Sales::where('id', $data['sales_id'])->first();
        $sales->attachment = $data['attachment'];
        $sales->inventory_id = $data['inventory_id'];
        $sales->customer_id = $data['customer_id'];
        $sales->sales_date = $data['sales_date'];
        $sales->description = $data['description'];
        $sales->save();

        return true;
    }

    public function delete($data)
    {
        $sales = Sales::where('id', $data['sales_id'])->first();
        $sales->delete();
    }

    public function customer()
    {
        return $this->customerModel::where('user_id', Auth::user()->id);
    }

    public function getTopSales()
    {
        if (!is_null(Auth::user())) {
            $company = Auth::user()->company();
            $topsales = $company->sales->sortBy('amount');

            return $topsales;
        }

        return [];
    }

    public function getAllSales()
    {
        if (!is_null(Auth::user())) {
            $company = Auth::user()->company();
            $sales = $company->sales();

            return $sales;
        }

        return [];
    }

    public function getSales($amount)
    {
        $allSales = $this->getAllSales();
        if (count($allSales) >= $amount) {
            return $allSales->take($amount);
        }

        return $allSales;
    }

    public function getSalesByDuration($start, $end)
    {
        if (!is_null(Auth::user())) {
            $sales = Sales::where('company_id', Auth::user()->company->id)->whereDate('sales_date', '<', $start)->whereDate('sales_date', '<', $end)->get();

            return $sales;
        }

        return [];
    }

    public function getDailySales($day)
    {
        if (!is_null(Auth::user())) {
            $sales = Sales::where('company_id', Auth::user()->company->id)->whereDate('sales_date', $day)->get();

            return $sales;
        }
    }

    public function getSaleById($id)
    {
        $sale = Sales::find($id);
        $data = [];
        if (!is_null($sale)) {
            $data['sale'] = $sale;
            $data['product'] = $sale->inventory;
        }

        return $data;
    }

    public function sendSaleAsInvoice(/*prbably gonna need some arguments*/)
    {
        /*

        TODO

        */
    }
}
