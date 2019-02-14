<?php

namespace App\Services\Client\Http\Controllers;

use App\Services\Client\Features\ActivateVendorFeature;
use App\Services\Client\Features\AddVendorFeature;
use App\Services\Client\Features\AddVendorPageFeature;
use App\Services\Client\Features\EditVendorPageFeature;
use App\Services\Client\Features\ListVendorsFeature;
use App\Services\Client\Features\SearchVendorFeature;
use App\Services\Client\Features\ShowAllVendorFeature;
use App\Services\Client\Features\ShowVendorPageFeature;
use App\Services\Client\Features\UploadVendorImageFeature;
use Illuminate\Http\Request;
use Lucid\Foundation\Http\Controller;

class VendorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function showVendorPage()
    {
        return $this->serve(ShowVendorPageFeature::class);
    }
    public function showAllVendor()
    {
        return $this->serve(ShowAllVendorFeature::class);
    }
    public function addVendorPage()
    {
        return $this->serve(AddVendorPageFeature::class);
    }

    public function addVendor()
    {
        return $this->serve(AddVendorFeature::class);
    }
    public function editVendorPage()
    {
        return $this->serve(EditVendorPageFeature::class);
    }
    public function listVendors()
    {
        return $this->serve(ListVendorsFeature::class);
    }
    public function searchVendors()
    {
        return $this->serve(SearchVendorFeature::class);
    }
    public function activateVendor($vendorId)
    {
        return $this->serve(ActivateVendorFeature::class, ['vendorId' => $vendorId]);
    }
    public function uploadVendorImage()
    {
        return $this->serve(UploadVendorImageFeature::class);
    }
}
