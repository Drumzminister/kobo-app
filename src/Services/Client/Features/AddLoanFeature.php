<?php

namespace App\Services\Client\Features;

use App\Domains\Loan\Jobs\AddLoanJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class AddLoanFeature extends Feature
{
    public function handle(Request $request)
    {
        $this->run(AddLoanJob::class, ['data' => $request->all(), 'userId' => auth()->id()]);
    }

}
