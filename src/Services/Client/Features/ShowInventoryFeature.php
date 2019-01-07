<?php

namespace App\Services\Client\Features;

use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Inventory\Jobs\GetInventoryDataJob;
use Lucid\Foundation\Feature;

class ShowInventoryFeature extends Feature
{
    public function handle()
    {
        $data = $this->run(GetInventoryDataJob::class);
        return $this->run(new RespondWithViewJob('client::inventory.inventory', $data));
    }
}
