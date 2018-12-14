<?php

namespace App\Services\Accountant\Features;

use App\Domains\Accountant\Jobs\AddClientReviewJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class AddClientReviewFeature extends Feature
{
    public function handle(Request $request)
    {
		$added = $this->run(AddClientReviewJob::class, ['data' => $request->all()]);

		if ($added)
			return back()->with('message', 'Review added successfully.');
		else
			return back()->with('error', 'Unable to add review');

    }
}
