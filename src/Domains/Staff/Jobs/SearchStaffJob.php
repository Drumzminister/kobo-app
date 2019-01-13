<?php

namespace App\Domains\Staff\Jobs;

use App\Data\Repositories\StaffRepository;
use Lucid\Foundation\Job;

class SearchStaffJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $staff, $param;

    public function __construct($param)
    {
        $this->param = $param;
        $this->staff = new StaffRepository();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = collect([]);
        $data->push($this->staff->searchByFirst_Name($this->param));
        $data->push($this->staff->searchByLast_Name($this->param));
        $data->push($this->staff->searchByRole($this->param));
        $data->push($this->staff->searchByPhone($this->param));
        $data->push($this->staff->searchByEmail($this->param));
        return collect(array_values($data->collapse()->unique('id')->all()));
    }
}
