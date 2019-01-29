<?php

namespace App\Services\Client\Http\Controllers;

use Illuminate\Http\Request;
use Lucid\Foundation\Http\Controller;

class BankPagesController extends Controller
{
    public function showDebtorsPage(){
    return $this->serve(\App\Services\Client\Features\ShowDebtorsPageFeature::class);
}
}
