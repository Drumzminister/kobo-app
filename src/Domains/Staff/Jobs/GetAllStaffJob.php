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
    private $staff;
    public function __construct()
    {
        $this->staff = new StaffRepository();
    }

    /**
     * Execute the job.
     *
     * @return array;
     */
    public function handle()
    {

        return $this->staff->all();
    }
}
