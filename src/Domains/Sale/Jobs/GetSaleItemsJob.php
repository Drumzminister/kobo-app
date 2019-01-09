<?php

namespace App\Domains\Sale\Jobs;

use App\Data\Repositories\CompanyRepository;
use App\Data\Repositories\SaleRepository;
use Lucid\Foundation\Job;

class GetSaleItemsJob extends Job
{
	/**
	 * @var \Illuminate\Foundation\Application|SaleRepository 
	 */
	private $sale;
	private $slug;

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
     *
     * @return void
     */
    public function handle()
    {
        //
    }
}
