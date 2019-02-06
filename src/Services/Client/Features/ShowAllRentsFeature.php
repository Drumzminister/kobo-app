<?php

namespace App\Services\Client\Features;

use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Rent\Jobs\GetRentPageDataJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ShowAllRentsFeature extends Feature
{
    public function handle(Request $request)
    {
        $data = $this->run(GetRentPageDataJob::class, ['companyId' => $request->user()->getUserCompany()]);
        return $this->run(new RespondWithViewJob('client::rents.all', $data));
    }
}
