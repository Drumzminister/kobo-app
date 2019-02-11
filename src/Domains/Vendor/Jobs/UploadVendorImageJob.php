<?php

namespace App\Domains\Vendor\Jobs;

use Lucid\Foundation\Job;

class UploadVendorImageJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $ext = $this->data->getClientOriginalExtension();
        $store = $this->data->storeAs('vendor', auth()->id().time().".{$ext}", 's3', 'public');
        return response()->json(['data' => $store]);
    }
}
