<?php

namespace Koboaccountant\Http\Controllers;

use App\Domains\Banking\Jobs\ListPaymentMethodsJob;
use Illuminate\Http\Request;
use Koboaccountant\Repositories\Bank\BankRepository;
use Koboaccountant\Repositories\Cash\CashRepository;
use Koboaccountant\Traits\CashTransactions;

class PaymentMethodController extends Controller
{
    protected $cash_repo;
    protected $bank_repo;

    public function __construct()
    {
        $this->bank_repo = new BankRepository();
        $this->cash_repo = new CashRepository();
    }

    public function get()
    {
        $modes = (new ListPaymentMethodsJob(auth()->user()->getUserCompany()->id))->handle();
        return response()->json($modes, 200);
    }
}
