<?php

namespace App\Services\Client\Features;

use App\Domains\Loan\Jobs\SearchLoanSourcesJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class SearchLoanSourcesFeature extends Feature
{
    private $param;
    public function __construct($param)
    {
        $this->param = $param;
    }

    public function handle(Request $request)
    {
        return $this->run(SearchLoanSourcesJob::class, ['param' => $this->param]);
    }
}
