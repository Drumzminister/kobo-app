<?php

namespace App\Services\Client\Features;

use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Vendor\Jobs\ListVendorsJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ShowMultipleInventoryFeature extends Feature
{
    public function handle(Request $request)
    {
        $data['vendors'] = $this->run(ListVendorsJob::class);
        return $this->run(new RespondWithViewJob('client::inventory.multiple-inventory', $data));
    }
}
