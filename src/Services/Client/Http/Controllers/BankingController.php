<?php

namespace App\Services\Client\Http\Controllers;

use App\Services\Client\Features\ShowBankingPagesFeature;
use App\Services\Client\Features\ShowBankingTransactionPagesFeature;
use Illuminate\Http\Request;
use Lucid\Foundation\Http\Controller;

class BankingController extends Controller
{
public function showBankingPages()
    {
    	return $this->serve(ShowBankingPagesFeature::class);
	}

	public function showBankingTransactionPages()
    {
    	return $this->serve(ShowBankingTransactionPagesFeature::class);
	}
}
