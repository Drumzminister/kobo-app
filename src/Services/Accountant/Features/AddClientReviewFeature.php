<?php

namespace App\Services\Accountant\Features;

use App\Domains\Accountant\Jobs\AddClientReviewJob;
use Illuminate\Support\Facades\Auth;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class AddClientReviewFeature extends Feature
{
    public function handle(Request $request)
    {
    	$data = $request->all();
    	$data['accountant_id'] = Auth::user()->accountant->id;

		$added = $this->run(AddClientReviewJob::class, ['data' => $data]);

		if ($added)
			return back()->with('message', 'Review added successfully.');
		else
			return back()->with('error', 'Unable to add review');

    }
}
