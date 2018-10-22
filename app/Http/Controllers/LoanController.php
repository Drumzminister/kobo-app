<?php

namespace Koboaccountant\Http\Controllers;

use Illuminate\Http\Request;
use Koboaccountant\Repositories\LoanRepository;

class LoanController extends Controller
{
    public function __construct(LoanRepository $loanRepository)
    {
        $this->loanRepository = $loanRepository;
    }
}
