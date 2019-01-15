<?php

namespace App\Services\Client\Features;

use App\Domains\Expenses\Jobs\SearchExpensesJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class SearchExpensesFeature extends Feature
{
    private $param;
    public function __construct($param)
    {
        $this->param = $param;
    }

    public function handle(Request $request)
    {
        return response()->json([
            'expenses' => $this->run(SearchExpensesJob::class, ['companyId' => auth()->user()->getUserCompany()->id, 'param' => $this->param])
        ]);
    }
}
