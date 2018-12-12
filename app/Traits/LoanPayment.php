<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 12/11/2018
 * Time: 12:56 AM
 */

namespace Koboaccountant\Traits;


use Illuminate\Http\Request;

trait LoanPayment
{
    public function getPayments($loan)
    {
        $payments = $this->payment_repo->findByLoan($loan);
        return response()->json([
            'payments'  =>  $payments
        ], 200);
    }

    public function makePayment(Request $request)
    {
        $payment = $this->payment_repo->create($request);

        return response()->json([
            'payment'   =>  $payment
        ], 200);
    }
}