<?php

namespace App\Services\Client\Features;

use App\Domains\Inventory\Jobs\AddInventoryJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class AddInventoryFeature extends Feature
{
    public function handle(Request $request)
    {
        $this->run(AddInventoryJob::class);
    }
}
