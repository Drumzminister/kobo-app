<?php

namespace App\Services\Client\Http\Controllers;

use App\Services\Client\Features\ShowBankingPagesFeature;
use Illuminate\Http\Request;
use Lucid\Foundation\Http\Controller;

class BankingController extends Controller
{
public function showBankingPages()
    {
    	return $this->serve(ShowBankingPagesFeature::class);
	}
}
