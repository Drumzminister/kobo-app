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
	 * @var string
	 */
	private $companyId;

	/**
	 * Create a new job instance.
	 *
	 * @param $companyId
	 */
	public function __construct($companyId)
	{
		$this->companyId = $companyId;
		$this->bankDetail = app(BankDetailRepository::class);
	}

	/**
	 * Execute the job.
	 */
	public function handle()
	{
		return $this->bankDetail->getByAttributes(['company_id' => $this->companyId]);
	}
}
