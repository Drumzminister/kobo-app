<?php

namespace App\Domains\Staff\Jobs;

use App\Data\Repositories\StaffRepository;
use Lucid\Foundation\Job;

class DeactivateStaffJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $staffId, $staff;
    public function __construct($staffId)
    {
        $this->staffId = $staffId;
        $this->staff = new StaffRepository();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $staff = $this->staff->findBy('id', $this->staffId);
        $state = ! $staff->isActive ? 'Activated' : 'Deactivated';
        $staff->fill(['isActive' => ! $staff->isActive])->save();
        return [
            "status" => "success",
            "message" => "Staff $state"
        ];
    }
}
