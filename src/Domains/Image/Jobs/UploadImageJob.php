<?php

namespace App\Domains\Staff\Jobs;

use Lucid\Foundation\Job;

class UploadImageJob extends Job
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
     */
    public function handle()
    {
        $ext = $this->data->getClientOriginalExtension();
        $store = $this->data->storeAs('staff', auth()->id() . time() . ".{$ext}", 's3', 'public');

        return $store;
    }
}
