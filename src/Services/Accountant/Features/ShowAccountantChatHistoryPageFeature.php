<?php

namespace App\Services\Accountant\Features;

use App\Domains\Chat\Jobs\LoadConversationsJob;
use Illuminate\Support\Facades\Auth;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ShowAccountantChatHistoryPageFeature extends Feature
{
    public function handle(Request $request)
    {
		$data['conversation'] = $this->run(LoadConversationsJob::class, [ 'userId' => Auth::user()->id, 'page' => $request->input('page', null)]);
    }
}
