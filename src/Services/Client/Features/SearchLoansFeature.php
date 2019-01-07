<?php

namespace App\Services\Client\Features;

use App\Domains\Loan\Jobs\SearchLoanJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class SearchLoansFeature extends Feature
{
    public function handle(Request $request)
    {
        $this->run(SearchLoanJob::class, ['query' => $request->all()['param']]);
    }
}
