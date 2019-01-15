<?php

namespace App\Domains\Inventory\Jobs;

use App\Data\Repositories\InventoryRepository;
use Lucid\Foundation\Job;

class GetCompanyInventoriesJob extends Job
{
	/**
	 * @var string
	 */
	private $companyId;

	/**
	 * @var \Illuminate\Foundation\Application|InventoryRepository
	 */
	private $inventory;

	/**
	 * Create a new job instance.
	 *
	 * @param string $companyId
	 */
    public function __construct(string $companyId)
    {
	    $this->companyId = $companyId;
	    $this->inventory = app(InventoryRepository::class);
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
    	return $this->inventory->getByAttributes(['company_id' => $this->companyId])->where('quantity', '>', 0);
    }
}
