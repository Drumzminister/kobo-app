<?php

namespace Koboaccountant\Http\Controllers;

use Illuminate\Http\Request;
use Koboaccountant\Repositories\Sales\SalesTransactionRepository;

class SalesTransactionController extends Controller
{
    public function __construct(SalesTransactionRepository $salesTransactionRepo)
    {
        $this->salesTransaction = $salesTransactionRepo;
    }
    public function store()
    {
        $this->salesTransaction->create($request);  
    }
}
