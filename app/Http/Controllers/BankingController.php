<?php

namespace Koboaccountant\Http\Controllers;

use Illuminate\Http\Request;
use Koboaccountant\Repositories\Bank\BankRepository;
use Koboaccountant\Repositories\Transactions\BankTransactionRepository;

class BankingController extends Controller
{
    protected $bank_repo;
    protected $transaction_repo;
    public function __construct()
    {
        $this->bank_repo = new BankRepository();
        $this->transaction_repo = new BankTransactionRepository();
    }

    public function index ()
    {
        $data['banks'] = $this->bank_repo->getAll();
        return view('bank.banking-pages', $data);
    }

    public function search (Request $request)
    {
        return $this->bank_repo->search($request->q);
    }

    public function makeTransfer (Request $request)
    {
        $payer = $this->bank_repo->findBy('id', $request->payer);
        $receiver = $this->bank_repo->findBy('id', $request->receiver);
        try {
            $this->bank_repo->spend($request->amount, $payer);
            $this->bank_repo->add($request->amount, $receiver);
            $this->transaction_repo->create([
                'bank_details_id'   =>  $payer->id,
                'class_id'          =>  "$receiver->id",
                'amount'            =>  $request->amount,
                'class'             =>   get_class($receiver),
                'description'       =>  "Transferred money from $payer->bank_name account name: $payer->account_name
                                         to $receiver->bank_name  account name: $receiver->account_name". "<br>" . "Comments: $request->comment",
            ]);
        }catch (\Exception $e) {
            return response()->json([$e->getMessage()], 400);
        }

        return response()->json(['Transfered successfully'],200);
    }

}
