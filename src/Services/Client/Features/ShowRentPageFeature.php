<?php

namespace App\Services\Client\Features;

use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Rent\Jobs\GetRentPageDataJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ShowRentPageFeature extends Feature
{
    public function handle(Request $request)
    {
        $data = $this->run(GetRentPageDataJob::class, ['companyId' => auth()->user()->getUserCompany()->id]);
        return $this->run(new RespondWithViewJob('client::rents.show', $data));
    }
}
