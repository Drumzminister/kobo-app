<?php

namespace App\Services\Web\Features;

use App\Domains\Expenses\Jobs\PayExpenseJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class PayExpenseFeature extends Feature
{
    public function __construct($expenseId)
    {
        $this->expenseId = $expenseId;
    }

    public function handle(Request $request)
    {
        return $this->run(PayExpenseJob::class, ['expenseId' => $this->expenseId, 'companyId' => $request->user()->getUserCompany()->id, 'data' => $request->all()]);
    }
}
