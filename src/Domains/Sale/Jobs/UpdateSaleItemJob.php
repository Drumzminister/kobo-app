<?php

namespace App\Domains\Sale\Jobs;

use App\Data\Repositories\SaleItemRepository;
use Koboaccountant\Traits\HelpsResponse;
use Lucid\Foundation\Job;

class UpdateSaleItemJob extends Job
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
	 * @param array  $data
	 */
	public function __construct(string $itemId, array $data)
	{
		$this->saleItem = app(SaleItemRepository::class);
		$this->data = $data;
		$this->itemId = $itemId;
	}

	/**
	 * Execute the job.
	 */
	public function handle()
	{
		$item = $this->saleItem->findOnly('id', $this->itemId);
		if ($item) {
			return $item->fill($this->data)->save() ?
				$this->createJobResponse('success', 'Item Updated', $item)
				: $this->createJobResponse('error', 'Item Not Updated', null);
		}

		return $this->createJobResponse('error', 'Item Not Found', null);
	}
}
