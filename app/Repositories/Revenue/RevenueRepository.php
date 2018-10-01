<?php

namespace Koboaccountant\Repositories\Revenue;

use Koboaccountant\Models\Revenue;
use Koboaccountant\Models\RevenueCategory;
use Koboaccountant\Models\Account;
use Koboaccountant\Models\PaymentMethod;

Class RevenueRepository extends BaseRepository
{
    public function __construct(Revenue $revenue, RevenueCategory $revenueCategory, Account $account, PaymentMethod $paymentMethod)
    {
        $this->revenueModel = $revenue;
        $this->revenueCategoryModel = $revenueCategory;
        $this->accountModel = $account;
        $this->paymentMethodModel = $paymentMethod;
    }

    public function create($data)
    {
        $revenue = new Revenue;
        $revenue->id = $this->generateUuid();
        $revenue->amount = $date['amount'];
        $revenue->description = $data['description'];
        $revenue->attachment = $data['attachment'];
        $revenue->account_id = $account->id;
        $revenue->category_id = $revenueCategory;
        $revenue->payment_method_id = $paymentMethod;

        $revenue->save();
        return true;
    }

    public function update() 
    {
        $revenue = Revenue::where('id', $date['revenue_id'])->first();
        $revenue->amount = isset($data['amount']) ? $data['amount'] : null;
        $revenue->description = isset($data['description']) ? $data['description'] : null;
        $revenue->attachment = isset($data['attachment']) ? $data['attachment'] : null;
        $revenue->category_id = isset($data['category_id']) ? $data['category_id'] : null;

        $revenue->save();
        return true;
    }

    public function delete($data)
    {
        $revenue = Revenue::where('id', $date['revenue_id'])->first();
        $revenue->delete();

        return true;
    }
}