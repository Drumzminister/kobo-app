<?php

namespace App\Services\Client\Features;

use App\Domains\Inventory\Jobs\AddInventoryJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class AddInventoryFeature extends Feature
{
    public function handle(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->id();
        $added = $this->run(AddInventoryJob::class, ['data' => $data]);

        if($added)
            return back()->with('message', 'Inventory added successfully.');

        return back()->with('error', 'Unable to add inventory');
    }
}
