<?php

namespace App\Domains\Rent\Jobs;

use App\Data\Repositories\RentRepository;
use Lucid\Foundation\Job;

class ListRentJob extends Job
{
    private $companyId;
    private $rent;

    /**
     * Create a new job instance.
     *
     * @param $companyId
     */
    public function __construct($companyId)
    {
        $this->rent = new RentRepository();
        $this->companyId = $companyId;
    }

    /**
     * Execute the job.
     *
     * @return \Illuminate\Http\Response
     */
    public function handle()
    {
        return response()->json([
            'rents' => array_values($this->rent->getByCompany_id(['user_id'=> $this->companyId])->all())
        ]);
    }
}
