<?php

namespace App\Domains\Staff\Jobs;

use App\Data\Repositories\StaffRepository;
use Lucid\Foundation\Job;

class GetAllStaffJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $staff, $companyId;
    public function __construct()
    {
        $this->staff = new StaffRepository();
        $this->companyId = auth()->user()->company->id;
    }

    /**
     * Execute the job.
     *
     * @return array;
     */
    public function handle()
    {
        $data['all_staff'] = $this->staff->latest($this->companyId);
        $data['count_staff'] = $this->staff->latest($this->companyId)->count();
        return $data;
    }
}
