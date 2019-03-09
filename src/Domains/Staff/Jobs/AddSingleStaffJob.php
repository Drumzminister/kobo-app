<?php

namespace App\Domains\Staff\Jobs;

use App\Data\Repositories\StaffRepository;
use Koboaccountant\Traits\HelpsResponse;
use Lucid\Foundation\Job;

class AddSingleStaffJob extends Job
{
    use HelpsResponse;
    /**
     * Create a new job instance.
     */
    private $data;

    /**
     * @var \Illuminate\Foundation\Application|StaffRepository
     */
    private $staff;

    /**
     * AddSingleStaffJob constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
        $this->staff = app(StaffRepository::class);
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $staff = $this->staff->fillAndSave($this->data);

        if ($staff) {
            return $this->createJobResponse('success', 'Staff created Successfully!', $staff);
        }

        return $this->createJobResponse('error', 'Staff cannot be created!', null);
    }
}
