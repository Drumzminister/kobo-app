<?php

namespace Koboaccountant\Http\Controllers;

use Illuminate\Http\Request;
use Koboaccountant\Repositories\Bank\BankRepository;

class BankingController extends Controller
{
    protected $bank_repo;
    public function __construct()
    {
        $this->bank_repo = new BankRepository();
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
}
