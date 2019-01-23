<?php

namespace App\Data\Repositories;


use Koboaccountant\Models\Staff;

class StaffRepository extends Repository
{
    public function __construct() {
        parent::__construct(new Staff);
    }

    public function latest($companyId)
    {
       return $this->model->where('company_id', $companyId)->latest()->get();
    }
}
