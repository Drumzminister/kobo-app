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
	private $userId;

	/**
	 * Create a new job instance.
	 *
	 * @param $userId
	 */
	public function __construct($userId)
	{
		$this->userId = $userId;
		$this->bankDetail = app(BankDetailRepository::class);
	}

	/**
	 * Execute the job.
	 */
	public function handle()
	{
		return $this->bankDetail->getByAttributes(['user_id' => $this->userId]);
	}
}
