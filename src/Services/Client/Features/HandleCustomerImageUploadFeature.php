<?php

namespace App\Services\Client\Features;

use App\Domains\Customer\Jobs\HandleCustomerImageUploadJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class HandleCustomerImageUploadFeature extends Feature
{
    public function handle(Request $request)
    {
        return $this->run(HandleCustomerImageUploadJob::class,['data' => $request->file('file')]);
    }
}
