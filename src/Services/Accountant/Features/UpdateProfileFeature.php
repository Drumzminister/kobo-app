<?php

namespace App\Services\Accountant\Features;

use App\Domains\Accountant\Jobs\UpdateAccountantProfileJob;
use App\Services\Accountant\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Lucid\Foundation\Feature;

class UpdateProfileFeature extends Feature
{
    public function handle(ProfileUpdateRequest $request)
    {
		$data = $request->all();
		$accountantId = Auth::user()->accountant->id;

		$isUpdated = $this->run(UpdateAccountantProfileJob::class, ['data' => $data, 'accountantId' => $accountantId]);

		if ($isUpdated)
			return back()->with('message', 'Accountant profile updated successfully.');

	    return back()->with('error', 'Unable to update accountant profile.');
    }
}
