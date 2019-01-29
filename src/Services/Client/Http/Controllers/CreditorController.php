<?php

namespace App\Services\Client\Http\Controllers;

use Illuminate\Http\Request;
use Lucid\Foundation\Http\Controller;

class CreditorController extends Controller
{
    public function showCreditorPage()
    {
         return $this->serve(\App\Services\Client\Features\ShowCreditorsFeature::class);
    }

    public function showSingleCreditorPage()
    {
         return $this->serve(\App\Services\Client\Features\ShowSingleCreditorsFeature::class);
    }

    public function showAllCreditor()
    {
         return $this->serve(\App\Services\Client\Features\ShowAllCreditorsFeature::class);
    }
}
