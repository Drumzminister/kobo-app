<?php

namespace App\Services\Client\Features;

use App\Domains\Staff\Jobs\SearchStaffJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class SearchStaffFeature extends Feature
{

    /**
     * @param Request $request
     * @return mixed
     */
    public function handle(Request $request)
    {
        return $this->run(SearchStaffJob::class, ['param' => $request->get('param')]);
    }
}
