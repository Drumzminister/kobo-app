<?php

namespace App\Services\Client\Http\Controllers;

use App\Services\Client\Features\ShowBankPagesFeature;
use Illuminate\Http\Request;
use Lucid\Foundation\Http\Controller;

class BankPagesController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth']);
	}

	public function showBankPages()
    {
    	return $this->serve( ShowBankPagesFeature::class);
	}
}
