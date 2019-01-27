<?php

namespace App\Domains\Staff\Jobs;

use Lucid\Foundation\Job;

class ImageUploadJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $data;

    /**
     * ImageUploadJob constructor.
     * @param $data
     */
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
        $store = $this->data->storeAs('staff', auth()->id() . time() . ".{$ext}", 's3', 'public');
        return response()->json(['data' => $store]);
    }
}
