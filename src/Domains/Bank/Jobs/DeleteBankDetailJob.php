<?php

namespace App\Domains\Bank\Jobs;

use App\Data\Repositories\BankDetailRepository;
use Lucid\Foundation\Job;

class DeleteBankDetailJob extends Job
{
	private $detailId;

	/**
	 * @var \Illuminate\Foundation\Application|BankDetailRepository
	 */
	private $bankDetail;

	/**
	 * Create a new job instance.
	 *
	 * @param $detailId
	 */
    public function __construct($detailId)
    {
        $this->detailId = $detailId;
        $this->bankDetail = app(BankDetailRepository::class);
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        return $this->bankDetail->remove($this->detailId);
    }
}
