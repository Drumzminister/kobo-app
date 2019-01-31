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
    	return $this->model->newQuery()->where('company_id', '=', $companyId)->get();
    }
}
