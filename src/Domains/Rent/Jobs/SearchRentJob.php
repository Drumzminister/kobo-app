<?php

namespace App\Domains\Rent\Jobs;

use App\Data\Repositories\RentRepository;
use Lucid\Foundation\Job;

class SearchRentJob extends Job
{
    private $param;
    private $rent;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($param)
    {
        $this->param = $param;
        $this->rent = new RentRepository();
    }

    /**
     * Execute the job.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle()
    {
//        $this->rent->findBy('company_id', $this->rent->get)
        return response();
    }
}
