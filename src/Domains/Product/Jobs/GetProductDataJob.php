<?php

namespace App\Domains\Product\Jobs;

use App\Data\Repositories\ProductRepository;
use Lucid\Foundation\Job;

class GetProductDataJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $products, $companyId;

    public function __construct()
    {
        $this->products = new ProductRepository();
        $this->companyId = auth()->user()->company->id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data['products'] = $this->products->getBy('company_id', $this->companyId);
        return $data;
    }
}
