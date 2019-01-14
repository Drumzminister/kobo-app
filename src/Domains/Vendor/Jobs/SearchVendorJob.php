<?php

namespace App\Domains\Vendor\Jobs;

use App\Data\Repositories\VendorRepository;
use Lucid\Foundation\Job;

class SearchVendorJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $vendor, $data;

    public function __construct($data)
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
        $data = collect([]);
        $data->push($this->vendor->searchByName($this->data));
        $data->push($this->vendor->searchByAddress($this->data));
        $data->push($this->vendor->searchByPhone($this->data));
        $data->push($this->vendor->searchByEmail($this->data));
        $data->push($this->vendor->searchByWebsite($this->data));
        return collect(array_values($data->collapse()->unique('id')->all()));
    }
}
