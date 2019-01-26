<?php

namespace App\Services\Client\Features;

use App\Domains\Customer\Jobs\DeleteCustomerJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class DeleteCustomerFeature extends Feature
{
    private $customerId;
    public function __construct($customerId)
    {
        $this->customerId = $customerId;
    }
    public function handle(Request $request)
    {
        $added = $this->run(DeleteCustomerJob::class, ['customerId' => $this->customerId]);

        if($added)
            return response()->json(['message' => 'Customer was deleted']);

        return response()->json(['message' => 'Issue deleting customer']);
    }
}
