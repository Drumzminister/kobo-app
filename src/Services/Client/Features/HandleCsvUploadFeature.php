<?php

namespace App\Services\Client\Features;

use App\Domains\Customer\Jobs\HandleCsvUploadJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class HandleCsvUploadFeature extends Feature
{
    public function handle(Request $request)
    {
        return $this->run(HandleCsvUploadJob::class, ['data' => $request->file('file')]);
    }
}
