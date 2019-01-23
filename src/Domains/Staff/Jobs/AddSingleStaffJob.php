<?php

namespace App\Domains\Staff\Jobs;

use App\Data\Repositories\StaffRepository;
use Lucid\Foundation\Job;

class AddSingleStaffJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $data, $staff;

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->staff = new StaffRepository();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return $this->staff->fillAndSave($this->data);
    }
}
