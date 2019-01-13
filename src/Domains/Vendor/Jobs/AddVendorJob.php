<?php

namespace App\Domains\Vendor\Jobs;

use App\Data\Repositories\VendorRepository;
use Lucid\Foundation\Job;

class AddVendorJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $vendor, $data;

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->vendor = new VendorRepository();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try{
            return $this->vendor->fillAndSave($this->data);
        }catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
