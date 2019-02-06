<?php

namespace App\Services\Client\Features;

use App\Domains\Product\Jobs\AddProductJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class AddProductFeature extends Feature
{
    public function handle(Request $request)
    {
        $added = $this->run(AddProductJob::class, ['data' => $request->all(), 'companyId' => auth()->user()->company->id, 'userId' => auth()->user()->id]);
        return response(['message' => $added]);
    }
}
