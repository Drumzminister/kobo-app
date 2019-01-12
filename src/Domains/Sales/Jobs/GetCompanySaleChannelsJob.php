<?php

namespace App\Domains\Sales\Jobs;

use App\Data\Repositories\BankDetailRepository;
use App\Data\Repositories\SaleChannelRepository;
use Lucid\Foundation\Job;

class GetCompanySaleChannelsJob extends Job
{
	/**
	 * @var string
	 */
	private $companyId;

	/**
	 * @var \Illuminate\Foundation\Application|SaleChannelRepository
	 */
	private $saleChannel;

	/**
	 * Create a new job instance.
	 *
	 * @param string $companyId
	 */
	public function __construct(string $companyId)
	{
		$this->saleChannel = app(SaleChannelRepository::class);
		$this->companyId = $companyId;
	}

	/**
	 * Execute the job.
	 */
	public function handle()
	{
		$saleChannels = $this->saleChannel->getByAttributes(['company_id' => $this->companyId]);
		return $saleChannels;
	}
}
