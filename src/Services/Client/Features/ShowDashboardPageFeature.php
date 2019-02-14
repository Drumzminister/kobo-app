<?php

namespace App\Services\Client\Features;

use App\Domains\Dashboard\Jobs\GetClientDashboardDataJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ShowDashboardPageFeature extends Feature
{
    public function handle(Request $request)
    {
    	$data = $this->run(GetClientDashboardDataJob::class);
		return $this->run(new RespondWithViewJob('dashboard', $data));
    }
}
