<?php

namespace App\Domains\Rent\Jobs;

use App\Data\Repositories\RentRepository;
use Lucid\Foundation\Job;

class SearchRentJob extends Job
{
    private $param;
    private $rent;
    private $companyId;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($param, $companyId = null)
    {
        $this->param = $param;
        $this->companyId = $companyId;
        $this->rent = new RentRepository();
    }

    /**
     * Execute the job.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle()
    {
        $results = $this->rent->searchBy('property_details', $this->param, $this->companyId);
        return response()->json([
            'rents' =>  $results
        ]);
    }
}
