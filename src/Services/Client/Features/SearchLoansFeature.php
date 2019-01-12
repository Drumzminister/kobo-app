<?php

namespace App\Services\Client\Features;

use App\Domains\Loan\Jobs\SearchLoanJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class SearchLoansFeature extends Feature
{
    private $param;

    public function __construct($param)
    {
        $this->param = $param;
    }

    public function handle(Request $request)
    {
        return $this->run(SearchLoanJob::class, ['param' => $this->param, 'companyId' => auth()->user()->company->id]);
    }
}
