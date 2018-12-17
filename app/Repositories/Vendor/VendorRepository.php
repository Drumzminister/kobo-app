<?php

namespace Koboaccountant\Repositories\Vendor;

use Koboaccountant\Repositories\BaseRepository;
use Koboaccountant\Models\Vendor;


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
}