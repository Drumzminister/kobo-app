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
        if ($request->payment_method === "cash") {
            if (!$this->cash_repo->canSpendCash($request->amount)) {
                return response()->json([
                    'error' =>  'Amount inserted is greater than available cash',
                ], 400);
            }
            try {
                $this->cash_repo->spendCash($request->amount);
                $payment = $this->payment_repo->create($request);
            }
            catch (\Exception $e) {
                return response()->json([
                    'error' =>  'Unable to pay loan. Please try again later',
                ], 400);
            }
        }

        return response()->json([
            'payment'   =>  $payment
        ], 200);
    }
}