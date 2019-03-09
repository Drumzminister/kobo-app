<?php

namespace App\Services\Client\Features;

use App\Domains\Staff\Jobs\AddSingleStaffJob;
use App\Services\Client\Http\Requests\AddNewStaffRequest;
use Lucid\Foundation\Feature;

class AddSingleStaffFeature extends Feature
{
    public function handle(AddNewStaffRequest $request)
    {
        $data = $request->all();
        $data['company_id'] = auth()->user()->company->id;
        $data['user_id'] = auth()->id();
        $response = $this->run(AddSingleStaffJob::class, ['data' => $data]);

        if ($response->status === "success") {
            alert()->success('', $response->message)->autoClose(3000);

            return back();
        }

        alert()->error('', $response->message)->autoClose(3000);

        return back();
    }
}
