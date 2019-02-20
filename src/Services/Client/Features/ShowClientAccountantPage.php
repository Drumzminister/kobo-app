<?php

namespace App\Services\Client\Features;

use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Domains\Accountant\Jobs\GetAccountantProfileJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ShowClientAccountantPage extends Feature
{	

	public function handle(Request $request)
    {
    	$data['accountant'] = $accountant = $this->run(GetAccountantProfileJob::class, ['accountantId' => $request->user()->client->accountantClient->accountant->id]);
    	// dd($accountant->rating());
    	return $this->run(new RespondWithViewJob('client::view-accountant', $data));
    }
}

