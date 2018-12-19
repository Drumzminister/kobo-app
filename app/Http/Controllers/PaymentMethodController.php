<?php

namespace Koboaccountant\Http\Controllers;

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
        $modes = [
            [
                'mode'  =>  "Cash",
                'balance'   =>  $this->cash_repo->getUserCash(),
            ],
        ];
        foreach ($this->bank_repo->getAuthUserBanks() as $bank) {
            $mode = [
                'mode'      =>  $bank->bank_name,
                'balance'   =>  floatval($bank->account_balance),
            ];
            array_push($modes, $mode);
        }

        return response()->json($modes, 200);
    }
}
