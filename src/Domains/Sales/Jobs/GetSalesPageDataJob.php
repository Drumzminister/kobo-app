<?php

namespace App\Domains\Sales\Jobs;

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
	    $this->compa = app(SaleRepository::class);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
    }
}
