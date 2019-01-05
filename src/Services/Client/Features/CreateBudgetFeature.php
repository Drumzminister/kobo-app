<?php

namespace App\Services\Client\Features;

use App\Domains\Accountant\Jobs\CreateBudgetJob;
use App\Services\Accountant\Http\Requests\BudgetCreationRequest;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class CreateBudgetFeature extends Feature
{
    public function handle(BudgetCreationRequest $request)
    {
		return $this->run(CreateBudgetJob::class);
    }
}
