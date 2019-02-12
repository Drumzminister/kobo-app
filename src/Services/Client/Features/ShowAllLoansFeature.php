<?php

namespace App\Services\Client\Features;

use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Loan\Jobs\GetLoanPageDataJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ShowAllLoansFeature extends Feature
{
    public function handle(Request $request)
    {
    	$data = $this->run(GetLoanPageDataJob::class, ['companyId' => auth()->user()->getUserCompany()->id]);
    	return $this->run(new RespondWithViewJob('client::loans.all', $data));
    }
}
