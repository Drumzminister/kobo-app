<?php

namespace App\Domains\Rent\Jobs;

use App\Data\Repositories\RentRepository;
use Lucid\Foundation\Job;
use Koboaccountant\Helpers\RentHelper as Helper;

class GetRentPageDataJob extends Job
{
    private $rent, $companyId;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($companyId)
    {
        $this->companyId = $companyId;
        $this->rent = new RentRepository();
    }

    /**
     * Execute the job.
     *
     * @return array
     */
    public function handle()
    {
        $data['total'] = $this->rent->all()->sum('amount');
        $data['total_used_rent'] = Helper::getTotalUsedRent();
        $data['rents'] = $this->rent->getByCompany_id($this->companyId);
        return $data;
    }
}
