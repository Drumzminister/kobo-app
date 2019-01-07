<?php

namespace App\Services\Client\Http\Controllers;

use App\Services\Client\Features\AddLoanFeature;
use App\Services\Client\Features\AddLoanSourceFeature;
use App\Services\Client\Features\ListLoansFeature;
use App\Services\Client\Features\ListLoanSourcesFeature;
use App\Services\Client\Features\PayLoanFeature;
use App\Services\Client\Features\SearchLoansFeature;
use App\Services\Client\Features\SearchLoanSourcesFeature;
use Illuminate\Http\Request;
use Lucid\Foundation\Http\Controller;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function addLoan()
    {
        $this->serve(AddLoanFeature::class);
    }

    public function listLoan()
    {
        $this->serve(ListLoansFeature::class);
    }

    public function payLoan($loanId)
    {
        $this->serve(PayLoanFeature::class, ['loanId' => $loanId]);
    }

    public function searchLoan()
    {
        $this->serve(SearchLoansFeature::class);
    }

    public function addSources()
    {
        $this->serve(AddLoanSourceFeature::class);
    }

    public function listSources()
    {
        $this->serve(ListLoanSourcesFeature::class);
    }

    public function searchSources()
    {
        $this->serve(SearchLoanSourcesFeature::class);
    }
}
