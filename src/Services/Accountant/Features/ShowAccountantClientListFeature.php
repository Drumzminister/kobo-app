<?php

namespace App\Services\Accountant\Features;

use App\Domains\Accountant\Jobs\GetAllAccountantClientJob;
use Illuminate\Support\Facades\Auth;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ShowAccountantClientListFeature extends Feature
{
    public function handle(Request $request)
    {
		$data['clients'] = $this->run(GetAllAccountantClientJob::class, ['accountantId' => Auth::user()->accountant->id]);

		// ToDo: Show the View and inject the $data into the view.
    }
}
