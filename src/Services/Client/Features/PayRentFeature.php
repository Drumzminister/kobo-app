<?php

namespace App\Services\Client\Features;

use App\Domains\Rent\Jobs\PayRentJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class PayRentFeature extends Feature
{
    public function __construct($rentId)
    {
        $this->rentId = $rentId;
    }

    public function handle(Request $request)
    {
        try {
            $this->run(PayRentJob::class, ['rentId' => $this->rentId,'companyId' => auth()->user()->getUserCompany()->id, 'data' => $request->all()]);
            return response()->json([
                'message'   => "Payment made successfully"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message'   =>  $e->getMessage()
            ], 400);
        }
    }
}
