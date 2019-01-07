<?php

namespace App\Services\Client\Http\Controllers;

use App\Services\Client\Features\AddRentFeature;
use App\Services\Client\Features\ListRentFeature;
use App\Services\Client\Features\SearchRentFeature;
use App\Services\Client\Features\ShowAllRentsFeature;
use App\Services\Client\Features\ShowRentPageFeature;
use App\Services\Client\Features\UpdateRentFeature;
use Illuminate\Http\Request;
use Lucid\Foundation\Http\Controller;

class RentController extends Controller
{
    public function showRentPage()
    {
        return $this->serve(ShowRentPageFeature::class);
    }

    public function  showAllRents()
    {
        return $this->serve(ShowAllRentsFeature::class);
    }

    public function addRent()
    {
        return $this->serve(AddRentFeature::class);
    }

    public function listRent()
    {
        return $this->serve(ListRentFeature::class);
    }

    public function updateRent($rentId)
    {
        return $this->serve(UpdateRentFeature::class, ['rentId' => $rentId]);
    }

    public function searchRent($param)
    {
        return $this->serve(SearchRentFeature::class, ['param' => $param]);
    }
}
