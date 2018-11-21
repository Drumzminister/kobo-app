<?php

namespace Koboaccountant\Repository\Revenue;

use Koboaccountant\Models\RevenueCategory;

class RevenueCategoryRepository {

    public function __construct()
    {
        
    }

    public function add($data)
    {
        $revenueCategory = new RevenueCategory;
        $revenueCategory->name = $data['name'];
        $revenueCategory->save();

        return true;
    }

    public function delete($data)
    {
        $revenueCategory = RevenueCategory::where('id', $data['revenueCategory_id'])->first();
        $revenueCategory->delete();

        return true;
    }
}