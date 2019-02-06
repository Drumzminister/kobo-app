<?php

namespace App\Services\Client\Features;

use App\Domains\Inventory\Jobs\AddInventoryJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class AddInventoryFeature extends Feature
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(Request $request)
    {
        $added = $this->run(AddInventoryJob::class, ['data' => $request->all(), 'userId' => auth()->id(), 'companyId' => auth()->user()->company->id]);

        if($added) {
            return response()->json(['message' => 'Inventory added successfully.']);
        }

        return response()->json(['error', 'Unable to add inventory']);
    }
}
