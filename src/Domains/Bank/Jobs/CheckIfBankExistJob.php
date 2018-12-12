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
	 * Create a new job instance.
	 *
	 * @param array $data
	 */
	public function __construct(array $data)
	{
		$this->data = $data;
		$this->bankDetail = app(BankDetailRepository::class);
	}

	/**
	 * Execute the job.
	 */
	public function handle()
	{
		$bankDetail = $this->bankDetail->getByAttributes(['account_number' => $this->data['account_number'], 'user_id' => $this->data['account_number']]);

		return $bankDetail;
	}
}
