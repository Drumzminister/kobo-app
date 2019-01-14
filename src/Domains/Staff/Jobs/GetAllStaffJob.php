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
        $this->staff = app(StaffRepository::class);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return $this->staff->all();
    }
}
