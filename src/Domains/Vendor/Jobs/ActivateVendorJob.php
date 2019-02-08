<?php

namespace App\Domains\Vendor\Jobs;

use App\Data\Repositories\VendorRepository;
use Illuminate\Http\Request;
use Lucid\Foundation\Job;

class ActivateVendorJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $vendorId, $vendor;

    public function __construct($vendorId)
    {
        $this->vendorId = $vendorId;
        $this->vendor = app(VendorRepository::class);
    }

    /**
     * Execute the job.
     *
     * @return array|void
     */
    public function handle()
    {
        $vendor = $this->vendor->findBy('id', $this->vendorId);
        $state = ! $vendor->isActive ? 'Activated' : 'Deactivated';
        $vendor->fill(['isActive' => !$vendor->isActive])->save();

        return [
            "status" => 'success',
            'message' => "Vendor $state"
        ];
    }
}
