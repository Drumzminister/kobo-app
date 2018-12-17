<?php

namespace Koboaccountant\Repositories\Vendor;

use Koboaccountant\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Koboaccountant\Repositories\BaseRepository;


class VendorRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct(new Vendor());
    }

    public function create($data)
    {
        $vendor = $this->model;
        $vendor->id = $this->generateUuid();
        $vendor->name = $data['name'];
        $vendor->email = $data['email'];
        $vendor->address = $data['address'];
        $vendor->phone = $data['number'];
        $vendor->website = $data['website'];
        $vendor->company_id = $this->getAuthUserId();
        $vendor->save();
        return true;
    }

    public function getAll()
    {
        if(! is_null(Auth::user()))
        {
            return $this->model->where('company_id', $this->getAuthUserId());
        }
        return [];
    }
}