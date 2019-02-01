<?php

namespace App\Data\Repositories;


use App\Data\InventoryItem;

class InventoryItemRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(new InventoryItem);
    }
//    public function latestInventory($companyId)
//    {
//        return $this->model->where('company_id', $companyId)->latest()->get();
//    }
    
    public function getAvailableInventoryItem($companyId)
    {
        return $this->model->newQuery()->where('company_id', '=', $companyId)->get();
    }

    public function topTenQuantityPurchases($companyId)
    {
        return $this->model->newQuery()->where('company_id', $companyId)->orderBy('quantity', 'desc')->take(10)->get();
    }

    public function topTenHighestAmountPurchases($companyId)
    {
        return $this->model->newQuery()->where('company_id', $companyId)->orderBy('cost_price', 'desc')->take(10)->get();
    }
    public function deleteInventoryItem($inventoryId)
    {
        return $this->model->newQuery()->where('inventory_id', $inventoryId)->delete();
    }
}
