<?php

namespace Koboaccountant\Repositories\Sales;

use Koboaccountant\Repositories\BaseRepository;
use Koboaccountant\Models\SalesChannel;
use Koboaccountant\Models\Sales;
use Koboaccountant\Notifications\MadeSales;
use Auth;
use Koboaccountant\Models\Inventory;
use Koboaccountant\Models\Company;
use Koboaccountant\Models\Customer;
use Koboaccountant\Models\SalesTransaction;

class SalesTransactionRepository extends BaseRepository
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
        parent::__construct(new SalesTransaction());
    }
    
    
    public function create($data)
    {
        //Check for product availability
        if ($this->inventoryRepo->checkAvailability($data['inventory_id'], $data['quantity'])) {
            //Reduce Inventory
            $this->inventoryRepo->reduceQuantity($data['inventory_id'], $data['quantity']);
            $sales = $this->model;
            $sales->id = $this->generateUuid();
            $sales->description = $data['description'];            
            $sales->quantity = $data['quantity'];
            $sales->inventory_id = $data['inventory_id'];
            $sales->amount = $data['amount'];
            $sales->sales_channel_id = $data['sales_channel_id'];
            $sales->payment_mode_id = $data['payment_mode_id'];
            $sales->save();

            //notifyAccountant
            // $accountant = Auth::user()->company->accountant;
            // $accountant->notify(new MadeSales($sales->id));

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
        $sales = $this->model::where('id', $data['sales_id'])->first();
        $sales->inventory_id = $data['inventory_id'];
        $sales->sales_channel_id = $data['sales_channel_id'];
        $sales->amount = $data['amount'];
        $sales->quantity = $data['quantity'];        
        $sales->description = $data['description'];
        $sales->save();

        return true;
    }

    public function delete($data)
    {
        $sales = $this->model::where('id', $data['sales_id'])->first();
        $sales->delete();
    }

    public function customer()
    {
        return $this->customerModel::where('user_id', $this->getAuthUserId());
    }

    public function inventory()
    {
        return $this->inventoryModel->where('user_id', $this->getAuthUserId());
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
            $sales = $this->model::where('company_id', Auth::user()->company->id)->whereDate('sales_date', '<', $start)->whereDate('sales_date', '<', $end)->get();

            return $sales;
        }

        return [];
    }

    public function getDailySales($day)
    {
        if (!is_null(Auth::user())) {
            $sales = $this->model::where('company_id', Auth::user()->company->id)->whereDate('sales_date', $day)->get();

            return $sales;
        }
    }

    public function getSaleById($id)
    {
        $sale = $this->model::find($id);
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
