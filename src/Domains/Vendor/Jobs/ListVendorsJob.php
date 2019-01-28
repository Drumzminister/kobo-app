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
    private $vendor, $companyId;

    /**
     * ListVendorsJob constructor.
     */
    public function __construct()
    {
        $this->vendor = app(VendorRepository::class);
        $this->companyId = auth()->user()->company->id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = $this->vendor->latest($this->companyId);
        return $data;
    }
}
