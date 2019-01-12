<?php

namespace App\Services\Client\Features;

use App\Domains\Loan\Jobs\ListLoanSourcesJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ListLoanSourcesFeature extends Feature
{
    public function handle(Request $request)
    {
        return response()->json([
            'sources'   => $this->run(ListLoanSourcesJob::class, ['companyId' => auth()->user()->company->id])
        ]);
    }
}
