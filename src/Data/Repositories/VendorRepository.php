<?php

namespace App\Data\Repositories;

use Koboaccountant\Models\Vendor;


class VendorRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(new Vendor());
    }

//    public function activate($id)
//    {
//        $vendor = $this->model::find($id);
//        if($vendor->isActive == 1){
//            $vendor->isActive = 0;
//            $vendor->save();
//            return true;
//        }elseif ($vendor->isActive == 0)
//        {
//            $vendor->isActive = 1;
//            $vendor->save();
//            return true;
//        }else {
//            return false;
//        }
//    }
}
