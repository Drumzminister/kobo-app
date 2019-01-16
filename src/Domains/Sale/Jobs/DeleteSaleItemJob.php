<?php

namespace App\Domains\Sale\Jobs;

use App\Data\Repositories\SaleItemRepository;
use Koboaccountant\Traits\HelpsResponse;
use Lucid\Foundation\Job;

class DeleteSaleItemJob extends Job
{
	use HelpsResponse;
	/**
	 * @var \Illuminate\Foundation\Application|SaleItemRepository
	 */
	private $saleItem;
	/**
	 * @var array
	 */
	private $data;
	/**
	 * @var string
	 */
	private $itemId;

	/**
	 * Create a new job instance.
	 *
	 * @param string $itemId
	 */
	public function __construct(string $itemId)
	{
		$this->saleItem = app(SaleItemRepository::class);
		$this->itemId = $itemId;
	}

	/**
	 * Execute the job.
	 */
	public function handle()
	{
		$item = $this->saleItem->findOnly('id', $this->itemId);
		if ($item) {
			return $item->delete() ?
				$this->createJobResponse('success', 'Item Deleted', $item)
				: $this->createJobResponse('error', 'Item Not Deleted', null);
		}

		return $this->createJobResponse('error', 'Item Not Found', null);
	}
}
