<?php

namespace App\Services\Client\Features;

use App\Domains\Staff\Jobs\AddSingleStaffJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class AddSingleStaffFeature extends Feature
{
    public function handle(Request $request)
    {
        $data = $request->all();
        $data['company_id'] = auth()->user()->company->id;
        $data['user_id'] = auth()->id();
        $added = $this->run(AddSingleStaffJob::class, ['data' => $data]);

        if($added)
            return response()->json(['message' => 'Staff added successfully']);

        return response()->json(['error', 'Unable to add staff']);
    }
}
