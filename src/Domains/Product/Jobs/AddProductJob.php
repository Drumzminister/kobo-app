<?php

namespace App\Domains\Product\Jobs;

use App\Data\Repositories\ProductRepository;
use Lucid\Foundation\Job;

class AddProductJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $product, $data, $companyId, $userId;
    public function __construct($data, $companyId, $userId)
    {
        $this->data = $data;
        $this->product = new ProductRepository();
        $this->companyId = $companyId;
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->data['user_id'] = $this->userId;
        $this->data['company_id'] = $this->companyId;
        $this->product->fillAndSave($this->data);
        return response(['message' => 'Successfully saved']);
    }
}
