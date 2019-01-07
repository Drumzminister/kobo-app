<?php

namespace App\Services\Accountant\Features;

use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ShowAccountantDashboardFeature extends Feature
{
    public function handle(Request $request)
    {
		return view('accountant.account-dashboard');
    }
}
