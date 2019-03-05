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
     * @param $staffId
     * @param $companyId
     */
    public function __construct($data, $staffId, $companyId)
    {
        $data['staffId'] = $staffId;
        $data['companyId'] = $companyId;
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
        
        if (is_null($rentId)) {
            return response()->json([
                'error' => 'An error occurred while creating the rent'
            ], 400);
        }

        return response()->json([
            'rent'  => $this->rent->findBy('id', $rentId)
        ]);
    }
}
