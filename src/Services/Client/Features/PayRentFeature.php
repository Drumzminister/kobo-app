<?php

namespace App\Services\Client\Features;

use App\Domains\Rent\Jobs\PayRentJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class PayRentFeature extends Feature
{
    public function __construct($rentId)
    {
        $this->rentId = $rentId;
    }

    public function handle(Request $request)
    {
        return $this->run(PayRentJob::class, ['rentId' => $this->rentId]);
    }
}
