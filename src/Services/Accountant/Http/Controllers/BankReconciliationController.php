<?php

namespace App\Services\Accountant\Http\Controllers;

use Illuminate\Http\Request;
use Lucid\Foundation\Http\Controller;

class BankReconciliationController extends Controller
{
   public function ShowBankReconciliationPage(){
    return $this->serve(\App\Services\Accountant\Features\ShowBankReconciliationPageFeature::class);
    }
 
}
