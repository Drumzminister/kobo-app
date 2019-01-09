<?php

namespace App\Services\Client\Features;

use App\Domains\Loan\Jobs\AddLoanSourceJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class AddLoanSourceFeature extends Feature
{
    public function handle(Request $request)
    {
        return $this->run(AddLoanSourceJob::class, ['data' => $request->all(), 'userId' => auth()->id(), 'companyId' => auth()->user()->company->id]);
    }
}
