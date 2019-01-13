<?php

namespace App\Services\Client\Features;

use App\Domains\Staff\Jobs\GetAllStaffJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class GetAllStaffFeature extends Feature
{
    public function handle(Request $request)
    {
        return $this->run(GetAllStaffJob::class);
    }
}
