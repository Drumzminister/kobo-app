<?php 

namespace App\Data\Repositories;

use Koboaccountant\Models\Inventory;

class InventoryRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(new Inventory);
    }

    public function getAvailableInventories($companyId)
    {
    	return $this->model->newQuery()->where('company_id', '=', $companyId)->latest()->get();
    }
    public function getCompanyDayInventory($companyId)
    {
        return $this->model->newQuery()->where('company_id', $companyId)->dayInventory()->orderBy('created_at', 'desc')->get();
    }
    public function getCompanyWeekInventory($companyId)
    {
        return $this->model->newQuery()->where('company_id', $companyId)->weekInventory()->orderBy('created_at', 'desc')->get();
    }
    public function getCompanyMonthInventory($companyId)
    {
        return $this->model->newQuery()->where('company_id', $companyId)->monthInventory()->orderBy('created_at', 'desc')->get();
    }
    public function getCompanyYearInventory($companyId)
    {
        return $this->model->newQuery()->where('company_id', $companyId)->yearInventory()->orderBy('created_at', 'desc')->get();
    }
}
