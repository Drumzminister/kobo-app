<?php

namespace App\Domains\Bank\Jobs;

use App\Data\Repositories\BankDetailRepository;
use Koboaccountant\Traits\HelpsResponse;
use Lucid\Foundation\Job;

class UpdateBankDetailJob extends Job
{
	use HelpsResponse;

	/**
	 * @var \Illuminate\Foundation\Application|BankDetailRepository
	 */
	private $bankDetail;

	/**
	 * @var array
	 */
	private $data;

	/**
	 * Create a new job instance.
	 *
	 * @param $data array
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
		$done = $this->bankDetail->find($this->data['id'])->fill($this->data)->save();

		if ($done) {
			return $this->createJobResponse('success', 'Bank detail updated successfully.', null);
		}

		return $this->createJobResponse('error', 'Unable to update bank detail.', null);
	}
}
