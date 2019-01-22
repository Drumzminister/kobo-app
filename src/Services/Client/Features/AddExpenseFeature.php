<?php

namespace App\Services\Client\Features;

use App\Domains\Expenses\Jobs\AddExpenseJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class AddExpenseFeature extends Feature
{
    public function handle(Request $request)
    {
        try {
            $expense = $this->run(AddExpenseJob::class, ['data' => $request->all(), 'userId' => auth()->id(), 'companyId' => auth()->user()->getUserCompany()->id]);
            return response()->json([
                'expense'   =>  $expense
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message'   => $e->getMessage()
            ], 400);
        }

    }
}
