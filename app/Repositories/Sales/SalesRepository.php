<?php

namespace Koboaccountant\Repositories\Sales;

use Koboaccountant\Repositories\BaseRepository;
use Koboaccountant\Models\SalesChannel;
use Koboaccountant\Models\Sales;
// use Koboaccountant\Reopsitories\Inventory\InventoryRepository;
use Koboaccountant\Notifications\MadeSales;
use Auth;
use Koboaccountant\Models\Inventory;
use Koboaccountant\Models\Company;
use Koboaccountant\Models\Customer;

class SalesRepository extends BaseRepository
{
    public function __construct(
        SalesChannel $salesChannel,
        Sales $sale,
        Inventory $inventory,
        Company $company,
        Customer $customer
        ) {
        $this->inventoryModel = $inventory;
        $this->salesModel = $sale;
        $this->salesChannelModel = $salesChannel;
        $this->companyModel = $company;
        $this->customerModel = $customer;
    }

    /**
     * @param $data
     * @return bool
     */
    public function addChannel($data)
    {
        $channel = new SalesChannel();
        $channel->id = $this->generateUuid();
        $channel->name = $data['name'];
        $channel->save();

        return true;
    }

    public function create($data)
    {
        //Check for product availability
        $sales = new Sales();
        $sales->id = $this->generateUuid();
        $sales->sales_transaction_id = $data['sales_transaction_id'];
        $sales->invoice_number = $data['invoice_number'];
        $sales->customer_id = $data['customer_id'];
        $sales->delivery_cost = $data['delivery_cost'];
        $sales->user_id = $data['user_id'];
        $sales->sales_date = $data['sales_date'];
        $sales->tax_id = $data['tax_id'];
        $sales->discount = $data['discount'];
        $sales->save();

        //notifyAccountant
        $accountant = Auth::user()->company->accountant;
        $accountant->notify(new MadeSales($sales->id));
    }

    public function update($data)
    {
        $sales = Sales::where('id', $data['sales_id'])->first();
        $sales->customer_id = $data['customer_id'];
        $sales->delivery_cost = $data['delivery_cost'];
        $sales->sales_date = $data['sales_date'];
        $sales->tax_id = $data['tax_id'];
        $sales->discount = $data['discount'];
        $sales->save();

        return true;
    }

    public function delete($data)
    {
        $sales = Sales::where('id', $data['sales_id'])->first();
        $sales->delete();
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
            $sales = Sales::where('company_id', Auth::user()->company->id)->whereDate('sales_date', '<', $start)->whereDate('sales_date', '<', $end);

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
