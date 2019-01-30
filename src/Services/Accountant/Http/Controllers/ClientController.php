<?php

namespace App\Services\Accountant\Http\Controllers;

use Illuminate\Http\Request;
use Lucid\Foundation\Http\Controller;

class ClientController extends Controller
{
    public function showClientPages(){
    return $this->serve(\App\Services\Accountant\Features\showClientPagesFeature::class);
    }

    public function showClientProfilePage(){
    return $this->serve(\App\Services\Accountant\Features\showClientProfilePageFeature::class);
    }

    public function showManageClientPage(){
    return $this->serve(\App\Services\Accountant\Features\ShowManageClientPageFeature::class);
    }
}
