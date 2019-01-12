<?php

namespace App\Services\Client\Features;

use App\Domains\Rent\Jobs\UpdateRentJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class UpdateRentFeature extends Feature
{
    private $rentId;
    public function __construct($rentId)
    {
        $this->rentId = $rentId;
    }

    public function handle(Request $request)
    {
        return $this->run(UpdateRentJob::class, ['data' => $request->all(), 'rentId' => $this->rentId]);
    }
}
