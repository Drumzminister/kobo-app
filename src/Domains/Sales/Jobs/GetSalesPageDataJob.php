<?php

namespace App\Domains\Sales\Jobs;

use App\Data\Repositories\CompanyRepository;
use App\Data\Repositories\SaleRepository;
use Lucid\Foundation\Job;

class GetSalesPageDataJob extends Job
{
	/**
	 * @var string
	 */
	private $slug;
	/**
	 * @var string
	 */
	private $userId;

	/**
	 * @var \Illuminate\Foundation\Application|SaleRepository
	 */
	private $sale;

	/**
	 * @var \Illuminate\Foundation\Application|CompanyRepository
	 */
	private $company;

	/**
	 * Create a new job instance.
	 *
	 * @param string $slug
	 * @param string $userId
	 */
    public function __construct(string $slug, string $userId)
    {
	    $this->slug = $slug;
	    $this->userId = $userId;
	    $this->sale = app(SaleRepository::class);
	    $this->company = app(CompanyRepository::class);
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
    	$company = $this->company->getByAttributes(['slug' => $this->slug])->first();

    	if (!$company) {
    		abort(404);
	    }

    	return $this->sale->getByAttributes(['company_id' => $company->id]);
    }
}
