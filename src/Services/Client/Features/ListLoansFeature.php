<?php

namespace App\Services\Client\Features;

use App\Domains\Loan\Jobs\ListLoanJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ListLoansFeature extends Feature
{
    public function handle(Request $request)
    {
        $this->run(ListLoanJob::class);
    }
}
