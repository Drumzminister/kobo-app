<?php

namespace App\Services\Client\Features;

use App\Domains\Rent\Jobs\ListRentJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ListRentFeature extends Feature
{
    public function handle(Request $request)
    {
        return $this->run(ListRentJob::class, ['userId' => auth()->id()]);
    }
}
