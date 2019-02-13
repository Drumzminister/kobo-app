<?php

namespace App\Domains\Bank\Jobs;

use App\Data\Repositories\BankDetailRepository;
use Lucid\Foundation\Job;

class CreateBankDetailJob extends Job
{
	/**
	 * @var string
	 */
	private $companyId;
	/**
	 * @var array
	 */
	private $data;

	/**
	 * @var \Illuminate\Foundation\Application|BankDetailRepository
	 */
	private $bankDetail;

	/**
	 * Create a new job instance.
	 *
	 * @param string $companyId
	 * @param array  $data
	 */
    public function __construct(string $companyId, array $data)
    {
	    $this->companyId = $companyId;
	    $this->data = $data;
	    $this->bankDetail = app(BankDetailRepository::class);
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
    	$this->data['company_id'] = $this->companyId;
    	$bankDetail = $this->bankDetail->fill($this->data);

    	return $bankDetail;
    }
}
