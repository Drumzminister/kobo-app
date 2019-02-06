<?php

namespace App\Domains\Bank\Jobs;

use App\Data\Repositories\BankDetailRepository;
use Lucid\Foundation\Job;

class CheckIfBankExistJob extends Job
{
	private $data;

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
	 * @param array  $data
	 */
	public function __construct(string $companyId, array $data)
	{
		$this->data = $data;
		$this->bankDetail = app(BankDetailRepository::class);
		$this->companyId = $companyId;
	}

	/**
	 * Execute the job.
	 */
	public function handle()
	{
		$bankDetail = $this->bankDetail->getByAttributes(['account_number' => $this->data['account_number'], 'company_id' => $this->companyId]);

		return $bankDetail;
	}
}
