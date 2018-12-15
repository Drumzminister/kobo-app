<?php

namespace App\Services\Accountant\Features;

use App\Domains\Accountant\Jobs\GetAccountantProfileJob;
use App\Domains\Http\Jobs\RespondWithViewJob;
use Illuminate\Support\Facades\Auth;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ShowAccountantProfileFeature extends Feature
{
    public function handle(Request $request)
    {
		$data = $this->run(GetAccountantProfileJob::class, ['accountantId' => Auth::user()->accountant->id]);

		return $this->run(new RespondWithViewJob('accountant::dashboard.profile', $data));
    }
}
