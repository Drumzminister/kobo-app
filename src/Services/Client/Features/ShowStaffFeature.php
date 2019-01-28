<?php

namespace App\Services\Client\Features;

use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Staff\Jobs\GetAllStaffJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ShowStaffFeature extends Feature
{
    public function handle(Request $request)
    {
        $data = $this->run(GetAllStaffJob::class);
        return $this->run(new RespondWithViewJob('client::staff.staff', $data));
    }
}
