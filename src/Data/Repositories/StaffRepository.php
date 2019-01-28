<?php

namespace App\Data\Repositories;


use Illuminate\Support\Facades\Storage;
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

    /**
     * @param $fileName
     * @return string
     */
    public function storeImage($fileName)
    {
        if(request()->hasFile($fileName))
            $file = request()->file($fileName);
            $store = Storage::disk('s3')->put('staff', $file);
            $path = Storage::url($store);
            return $path;

        return [];
    }
}
