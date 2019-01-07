<?php

namespace App\Domains\Rent\Jobs;

use App\Data\Repositories\RentRepository;
use Lucid\Foundation\Job;

class ListRentJob extends Job
{
    private $userId;
    private $rent;

    /**
     * Create a new job instance.
     *
     * @param $userId
     */
    public function __construct($userId)
    {
        $this->rent = new RentRepository();
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     *
     * @return \Illuminate\Http\Response
     */
    public function handle()
    {
        return response()->json([
            'rents' => array_values($this->rent->getByAttributes(['user_id'=> $this->userId])->all())
        ]);
    }
}
