<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 12/11/2018
 * Time: 2:42 PM
 */

namespace Koboaccountant\Repositories\Loan;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Koboaccountant\Models\LoanPayment;
use Koboaccountant\Repositories\BaseRepository;
use Koboaccountant\Repositories\LoanRepository;

class PaymentRepository extends BaseRepository
{
    protected $loan_repo;
    public function __construct()
    {
        parent::__construct(new LoanPayment());
        $this->loan_repo = new LoanRepository();
    }

    public function create(Request $request)
    {
        $loan = $this->loan_repo->find($request->loan_id);
        if (count($loan->payments) > 0) {
            $currentInterval = new Carbon($loan->payments->last()->schedule_payment);
        } else {
            $currentInterval = new Carbon($loan->start_date);
        }

        $payment = $this->model;
        $payment->id = $this->generateUuid();
        $payment->loan_id = $request->loan_id;
        $payment->amount = $request->amount;
        $payment->balance = (($loan->amount - $loan->amount_paid) + ($loan->interest * $loan->amount / 100) - $request->amount);
        $payment->payment_method = $request->payment_method;

        if ($loan->period === 'month') {
            if ($loan->payment_interval === 1) {
                $payment->schedule_payment = $currentInterval->addMonth();
            } else {
                $payment->schedule_payment = $currentInterval->addWeeks(4 / $loan->payment_interval);
            }
        } elseif ($loan->period === 'year') {
            if ($loan->payment_interval === 1) {
                $payment->schedule_payment = $currentInterval->addYear();
            } else {
                $payment->schedule_payment = $currentInterval->addMonths(12 / $loan->payment_interval);
            }
        } else {
            $payment->schedule_payment = $currentInterval->addDays($loan->payment_interval);
        }

        $payment->save();

        $loan->amount_paid = floatval($loan->amount_paid) + $payment->amount;
        $loan->save();

        return $this->model::find($payment->id);
    }

    public function findByLoan($loan)
    {
        $payments = LoanPayment::where('loan_id', $loan)->orderBy('created_at', 'desc')->get();
        return $payments;
    }
}