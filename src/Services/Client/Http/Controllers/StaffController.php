<?php

namespace App\Services\Client\Http\Controllers;

use App\Services\Client\Features\AddMultipleStaffFeature;
use App\Services\Client\Features\AddSingleStaffFeature;
use App\Services\Client\Features\AllActiveStaffFeature;
use App\Services\Client\Features\DeactivateStaffFeature;
use App\Services\Client\Features\GetAllStaffFeature;
use App\Services\Client\Features\ImageUploadFeature;
use App\Services\Client\Features\SearchStaffFeature;
use App\Services\Client\Features\ShowMultipleStaffFeature;
use App\Services\Client\Features\ShowSingleStaffFeature;
use App\Services\Client\Features\ShowStaffFeature;
use Illuminate\Http\Request;
use Lucid\Foundation\Http\Controller;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function showStaff()
    {
        return $this->serve(showStaffFeature::class);
    }

    /**
     * @return mixed
     */
    public function showSingleStaff()
    {
        return $this->serve(showSingleStaffFeature::class);
    }

    public function showMultipleStaff()
    {
        return $this->serve(showMultipleStaffFeature::class);
    }

    /**
     * @return mixed
     */
    public function addSingleStaff()
    {
        return $this->serve(AddSingleStaffFeature::class);
    }

    public function addMultipleStaff()
    {
        return $this->serve(addMultipleStaffFeature::class);
    }
//    public function allStaff()
//    {
//        return $this->serve(GetAllStaffFeature::class);
//    }
    public function searchStaff()
    {
        return $this->serve(SearchStaffFeature::class);
    }
    public function allActiveStaff()
    {
        return $this->serve(AllActiveStaffFeature::class);
    }
    public function imageUpload()
    {
        return $this->serve(ImageUploadFeature::class);
    }
    public function deactivateStaff($staffId)
    {
        return $this->serve(DeactivateStaffFeature::class, ['staffId' => $staffId]);
    }
}
