<?php

namespace App\Services\Client\Http\Controllers;

use App\Services\Client\Features\AddMultipleStaffFeature;
use App\Services\Client\Features\AddSingleStaffFeature;
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
        return $this->serve(addSingleStaffFeature::class);
    }
    public function addMultipleStaff()
    {
        return $this->serve(addMultipleStaffFeature::class);
    }
}
