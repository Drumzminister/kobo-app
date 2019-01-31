<?php

namespace App\Services\Accountant\Features;

use App\Domains\Accountant\Jobs\RegisterAccountantJob;
use App\Services\Accountant\Http\Requests\AccountantRegistrationRequest;
use Lucid\Foundation\Feature;

class RegisterAccountantFeature extends Feature
{
    public function handle(AccountantRegistrationRequest $request)
    {
		$isRegistered = $this->run(RegisterAccountantJob::class);
		
		if ($isRegistered) {
			return $this->goToDashboard();
		}
		
		return back()->with('error', 'Unable to complete registration');
    }
    
    private function goToDashboard()
    {
    	return redirect()->route('accountant.dashboard');
    }

    
}
