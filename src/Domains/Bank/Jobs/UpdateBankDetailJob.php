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
	 * @param $detailId
	 * @param $data array
	 */
	public function __construct($detailId, array $data)
	{
		$this->data = $data;
		$this->detailId = $detailId;
		$this->bankDetail = app(BankDetailRepository::class);
	}

	/**
	 * Execute the job.
	 */
	public function handle()
	{
		return $this->bankDetail->find($this->detailId)->fill($this->data)->save();
	}
}
