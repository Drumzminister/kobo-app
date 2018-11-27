<?php

namespace Koboaccountant\Repositories\Revenue;

use Koboaccountant\Models\Revenue;
use Koboaccountant\Models\RevenueCategory;
use Koboaccountant\Models\Account;
use Koboaccountant\Models\PaymentMethod;
use Auth;
use Koboaccountant\Models\Income;
Class RevenueRepository extends BaseRepository
{
    public function __construct
    (
        Revenue $revenue, 
        RevenueCategory $revenueCategory, 
        Account $account, 
        PaymentMethod $paymentMethod,
        Income $income
    )
    {
        $this->revenueModel = $revenue;
        $this->revenueCategoryModel = $revenueCategory;
        $this->accountModel = $account;
        $this->paymentMethodModel = $paymentMethod;
        $this->income = $income;
    }

    public function FetchAllRevenue()
    {
        return $this->revenue->orderBy('date', 'DESC')->get()->take(10);
    }

    public function filterByIncomeType($incomeType)
    {
        return $income::where('name', $incomeType);
    }

    public function create($data)
    {
        $revenue = new Revenue;
        $revenue->id = $this->generateUuid();
        $revenue->amount = $date['amount'];
        $revenue->description = $data['description'];
        $revenue->date = $data['date'];
        $revenue->attachment = $data['attachment'];
        $revenue->account_id = $data['account_id'];
        $revenue->revenue_category_id = $data['revenue_category_id'];
        $revenue->payment_method_id = $data['payment_method_id'];

        $revenue->save();
        return true;
    }

    public function update() 
    {
        $revenue = Revenue::where('id', $date['revenue_id'])->first();
        $revenue->amount = isset($data['amount']) ?: null;
        $revenue->description = isset($data['description']) ?: null;
        $revenue->attachment = isset($data['attachment']) ?: null;
        $revenue->category_id = isset($data['category_id']) ?: null;

        $revenue->save();
        return true;
    }

    public function delete($data)
    {
        $revenue = Revenue::where('id', $data['revenue_id'])->first();
        $revenue->delete();

        return true;
    }
}