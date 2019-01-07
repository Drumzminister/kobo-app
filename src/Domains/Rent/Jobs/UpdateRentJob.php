<?php

namespace App\Domains\Rent\Jobs;

use App\Data\Repositories\RentRepository;
use Lucid\Foundation\Job;

class UpdateRentJob extends Job
{
    private $rent;
    private $rentId;
    private $data;

    /**
     * Create a new job instance.
     *
     * @param $data
     * @param $rentId
     */
    public function __construct($data, $rentId)
    {
        $this->data = $data;
        $this->rentId = $rentId;
        $this->rent = new RentRepository();
    }

    /**
     * Execute the job.
     *
     * @return \Illuminate\Http\Response
     */
    public function handle()
    {
        return response()->json([
            'rent'  => $this->rent->update($this->data, $this->rentId)
        ]);
    }
}
