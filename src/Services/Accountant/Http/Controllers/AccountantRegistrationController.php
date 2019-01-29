<?php

namespace App\Services\Accountant\Http\Controllers;

use App\Services\Accountant\Features\RegisterAccountantFeature;
use App\Services\Accountant\Features\ShowNewAccountantFormFeature;
use Illuminate\Http\Request;
use Lucid\Foundation\Http\Controller;

class AccountantRegistrationController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest');
	}

	public function register()
    {
		return $this->serve(RegisterAccountantFeature::class);
    }

    public function showNewAccountantForm()
    {
		return $this->serve(ShowNewAccountantFormFeature::class);
		}

		public function showAccountantRegistrationPage()
    {
    return $this->serve(\App\Services\Accountant\Features\ShowAccountantRegistrationPageFeature::class);
		}

		public function showAccountantRegistrationPage2()
    {
    return $this->serve(\App\Services\Accountant\Features\ShowAccountantRegistrationPage2Feature::class);
		}
		
		

}
