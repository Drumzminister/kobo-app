<?php

namespace App\Data\Repositories;

use Koboaccountant\Models\Vendor;


class VendorRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(new Vendor());
    }
    public function latest($companyId)
    {
       $result = $this->model->where('company_id', $companyId)->latest()->get();
       return $result;
    }
    public function searchRecord($value, $companyId)
    {
        return $this->model->where('company_id', $companyId)
                            ->where('name', 'like', '%' . $value . '%')
                            ->orWhere('address', 'like', '%' . $value . '%')
//                            ->orWhere('phone', 'like', '%' . $value . '%')
//                            ->orWhere('email', 'like', '%' . $value . '%')
//                            ->orWhere('website', 'like', '%' . $value . '%')
                            ->get();
    }
}
