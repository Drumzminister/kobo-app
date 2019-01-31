<?php

namespace App\Services\Client\Http\Controllers;

use Illuminate\Http\Request;
use Lucid\Foundation\Http\Controller;

class BankPagesController extends Controller
{
    public function showBankPages(){
    return $this->serve(\App\Services\Client\Features\ShowBankPagesFeature::class);
}
}
