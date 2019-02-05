<?php

namespace App\Domains\Product\Jobs;

use Lucid\Foundation\Job;

class AddProductImageJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $image;

    public function __construct($data)
    {
        $this->image = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $ext = $this->image->getClientOriginalExtension();
        $store = $this->image->storeAs('product-images', auth()->id() . time() . $ext, 's3', 'public');
        return response(['data' => $store]);
    }
}
