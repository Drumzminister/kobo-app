<?php

namespace Koboaccountant\Traits;

use GuzzleHttp\Exception\ClientException;
use Auth;

trait Payments
{
	public function getAllPlans()
    {
		$plans = $this->paystack->getAllPlans();
		return $plans;
	}

	public function paid()
    {
        try{
            $sub = $this->paystack->createSubscription();
        } catch (ClientException $e){
//            dd($e->getMessage());
            $this->updatePaymentStatus('paid');
            return redirect('/dashboard');
        }
        $this->updatePaymentStatus('paid');
        return redirect('/dashboard');
    }

    public function updatePaymentStatus($status)
    {
        Auth::user()->payment_status = $status;
        Auth::user()->save();
    }
}