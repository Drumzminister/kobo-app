<?php

namespace Koboaccountant\Http\Controllers;

use Illuminate\Http\Request;
use Koboaccountant\Traits\Payments;
use Unicodeveloper\Paystack\Paystack;


class PaymentController extends Controller
{
    use Payments;

    public $paystack;
    
    function __construct()
    {
        $this->paystack = new Paystack();
        $this->middleware('auth');
    }

    public function index(){
    	$data['plans'] = $this->getAllPlans();
    	return view('get-started', $data);
    }
}

