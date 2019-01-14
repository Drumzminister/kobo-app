<?php

namespace App\Domains\Vendor\Jobs;

use App\Data\Repositories\VendorRepository;
use Lucid\Foundation\Job;

class ListVendorsJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $vendor;

    /**
     * ListVendorsJob constructor.
     */
    public function __construct()
    {
        $this->vendor = new VendorRepository();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = $this->vendor->all();
        return $data;
    }
}
