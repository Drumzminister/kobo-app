<?php

namespace App\Services\Client\Features;

use App\Domains\Rent\Jobs\SearchRentJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class SearchRentFeature extends Feature
{
    private $param;
    public function __construct($param)
    {
        $this->param = $param;
    }

    public function handle(Request $request)
    {
        return $this->run(SearchRentJob::class, ['param' => $this->param, 'companyId' => auth()->user()->company->id]);
    }
}
