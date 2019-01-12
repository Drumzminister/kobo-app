<?php

namespace App\Domains\Customer\Jobs;

use App\Data\Repositories\CustomerRepository;
use Lucid\Foundation\Job;

class GetCompanyCustomersJob extends Job
{
	/**
	 * @var \Illuminate\Foundation\Application|CustomerRepository
	 */
	private $customer;
	/**
	 * @var string
	 */
	private $companyId;

	/**
	 * Create a new job instance.
	 *
	 * @param string $companyId
	 */
    public function __construct(string $companyId)
    {
        $this->customer = app(CustomerRepository::class);
	    $this->companyId = $companyId;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $customers = $this->customer->getByAttributes(['company_id' => $this->companyId]);
        return $customers;
    }
}
