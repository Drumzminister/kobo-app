<?php

namespace App\Services\Client\Features;

use App\Domains\Staff\Jobs\ImageUploadJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class ImageUploadFeature extends Feature
{
    public function handle(Request $request)
    {
        return $this->run(ImageUploadJob::class, ['data' => $request->file('file')]);
    }
}
