<?php

namespace App\Services\Client\Features;

use App\Domains\Sales\Jobs\CreateSaleDraftJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ShowAddSalesPageFeature extends Feature
{
    public function handle(Request $request)
    {
    	$sale = $this->run(CreateSaleDraftJob::class, ['user' => auth()->user()]);
		return redirect()->route('sale.create', $sale->id);
    }
}
