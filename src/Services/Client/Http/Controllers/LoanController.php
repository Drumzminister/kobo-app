<?php

namespace App\Services\Client\Http\Controllers;

use App\Services\Client\Features\AddLoanFeature;
use App\Services\Client\Features\AddLoanSourceFeature;
use App\Services\Client\Features\ListLoanPaymentRecordsFeature;
use App\Services\Client\Features\ListLoansFeature;
use App\Services\Client\Features\ListLoanSourcesFeature;
use App\Services\Client\Features\PayLoanFeature;
use App\Services\Client\Features\SearchLoansFeature;
use App\Services\Client\Features\SearchLoanSourcesFeature;
use App\Services\Client\Features\ShowAllLoansFeature;
use App\Services\Client\Features\ShowLoansPageFeature;
use Illuminate\Http\Request;
use Lucid\Foundation\Http\Controller;

class LoanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->serve(ShowAllLoansFeature::class);
    }

    public function show()
    {
        return $this->serve(ShowLoansPageFeature::class);
    }

    public function addLoan()
    {
        return $this->serve(AddLoanFeature::class);
    }

    public function listLoan()
    {
        return $this->serve(ListLoansFeature::class);
    }

    public function payLoan($loanId)
    {
        return $this->serve(PayLoanFeature::class, ['loanId' => $loanId]);
    }

    public function listPayments($loanId)
    {
        return $this->serve(ListLoanPaymentRecordsFeature::class, ['loanId' => $loanId]);
    }

    public function searchLoan($param)
    {
        return $this->serve(SearchLoansFeature::class, ['param' => $param]);
    }

    public function addSources()
    {
        return $this->serve(AddLoanSourceFeature::class);
    }

    public function listSources()
    {
        return $this->serve(ListLoanSourcesFeature::class);
    }

    public function searchSources($param)
    {
        return $this->serve(SearchLoanSourcesFeature::class, ['param' => $param]);
    }
}
