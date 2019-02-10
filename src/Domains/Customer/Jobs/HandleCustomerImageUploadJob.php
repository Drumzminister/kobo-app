<?php

namespace App\Domains\Customer\Jobs;

use App\Data\Repositories\CustomerRepository;
use Lucid\Foundation\Job;

class HandleCustomerImageUploadJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $data, $customer;

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
        $store = $this->data->storeAs('customer', auth()->id() . time() . ".{$ext}", 's3', 'public');
        return response()->json(['data' => $store]);
        return $path;
    }
}
