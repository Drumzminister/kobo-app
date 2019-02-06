<?php

namespace App\Services\Client\Features;

use App\Domains\Product\Jobs\AddProductImageJob;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class AddProductImageFeature extends Feature
{
    public function handle(Request $request)
    {
       return $this->run(AddProductImageJob::class, ['data' => $request->file('file'), 'user_id' => auth()->user()->id, 'company_id' => auth()->user()->company->id]);

//        if($added) {
//            return response(['message' => 'Image successfully uploaded', 'data' => $added]);
//        }
//        return response(['message' => 'Error uploading image, please try again']);
    }
}
