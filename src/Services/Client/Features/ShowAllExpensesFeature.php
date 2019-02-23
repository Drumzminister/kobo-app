<?php

namespace App\Services\Client\Features;

use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Expenses\Jobs\GetExpensesPageDataJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ShowAllExpensesFeature extends Feature
{
    public function handle(Request $request)
    {
        $data = $this->run(GetExpensesPageDataJob::class, ['companyId' => auth()->user()->getUserCompany()->id]);
        return $this->run(new RespondWithViewJob('client::expenses.all', $data));
    }
}
