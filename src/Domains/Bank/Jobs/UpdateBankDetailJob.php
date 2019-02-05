<?php

namespace App\Domains\Bank\Jobs;

use App\Data\Repositories\BankDetailRepository;
use Lucid\Foundation\Job;

class UpdateBankDetailJob extends Job
{
	private $detailId;

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
		return $this->bankDetail->find($this->data['id'])->fill($this->data)->save();
	}
}
