<?php

namespace App\Domains\Rent\Jobs;

use App\Data\Repositories\RentRepository;
use Lucid\Foundation\Job;

class AddRentJob extends Job
{
    private $rent, $data;

    /**
     * Create a new job instance.
     *
     * @param $data
     * @param $userId
     */
    public function __construct($data, $companyId)
    {
        $data['userId'] = $companyId;
        $this->data = $data;
        $this->rent = new RentRepository();
    }

    /**
     * Execute the job.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle()
    {
        $rentId = $this->rent->create($this->data);

        return response()->json([
            'rent'  => $this->rent->findBy('id', $rentId)
        ]);
    }
}
