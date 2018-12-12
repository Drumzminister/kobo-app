<?php

namespace App\Domains\Bank\Jobs;

use App\Data\Repositories\BankDetailRepository;
use Lucid\Foundation\Job;

class GetBankAccountsJob extends Job
{
	/**
	 * @var \Illuminate\Foundation\Application|BankDetailRepository
	 */
	private $bankDetail;

	/**
	 * Create a new job instance.
	 */
	public function __construct()
	{
		$this->bankDetail = app(BankDetailRepository::class);
	}

	/**
	 * Execute the job.
	 */
	public function handle()
	{
		// ToDo: Validate Account: Check if Same has been stored before
		return $this->bankDetail->all();
	}
}
