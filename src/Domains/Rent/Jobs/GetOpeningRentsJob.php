<?php

namespace App\Domains\Rent\Jobs;

use Lucid\Foundation\Job;
use App\Data\Repositories\CompanyRepository;
use App\Data\Repositories\RentRepository;

class GetOpeningRentsJob extends Job
{
    private $rent;

    /**
     * Create a new job instance.
     *
     * @param $companyId
     * 
     * @return void
     */
    public function __construct($companyId)
    {
        $this->rent = new RentRepository();
        $this->companyId = $companyId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $rents = $this->rent->getOpening($this->companyId);
        return $rents;
    }
}
