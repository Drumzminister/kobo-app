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
    private $user;

    public function __construct(array $data, $user)
    {
        $this->data = $data;
        $this->vendor = new VendorRepository();
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return bool|\Illuminate\Database\Eloquent\Model
     * @throws \Exception
     */
    public function handle()
    {
        $userId = $this->user->id;
        $items = $this->data['items'];
        $added = false;
        dd($items);
        foreach($items as $key => $data)
        {
            $data['user_id'] = $userId;
            $data['company_id'] = $this->user->getUserCompany()->id;
            $added  = $this->vendor->fillAndSave($data);
        }

        return $added;

    }
}
