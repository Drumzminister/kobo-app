<?php

namespace App\Domains\Bank\Jobs;

use App\Data\Repositories\BankDetailRepository;
use Lucid\Foundation\Job;

class GetCompanyBankAccountsJob extends Job
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
	 * @param string $companyId
	 */
	public function __construct(string $companyId)
	{
		$this->bankDetail = app(BankDetailRepository::class);
		$this->companyId = $companyId;
	}

	/**
	 * Execute the job.
	 */
	public function handle()
	{
		$banks = $this->bankDetail->getByAttributes(['company_id' => $this->companyId]);
		return $banks;
	}
}
