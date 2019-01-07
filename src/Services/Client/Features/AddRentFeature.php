<?php

namespace App\Services\Client\Features;

use App\Domains\Rent\Jobs\AddRentJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class AddRentFeature extends Feature
{
    public function handle(Request $request)
    {
        return $this->run(AddRentJob::class, ['data' => $request->all(), 'companyId' => auth()->user()->company->id]);
    }
}
