<?php

namespace App\Domains\Bank\Jobs;

use App\Data\Repositories\BankDetailRepository;
use Koboaccountant\Traits\HelpsResponse;
use Lucid\Foundation\Job;

class AddBankAccountJob extends Job
{
	use HelpsResponse;

	private $data;

	/**
	 * @var \Illuminate\Foundation\Application|BankDetailRepository
	 */
	private $bankDetail;
	/**
	 * @var string
	 */
	private $companyId;

	/**
	 * Create a new job instance.
	 *
	 * @param array  $data
	 * @param string $companyId
	 */
    public function __construct(array $data, string $companyId)
    {
        $this->data = $data;
        $this->bankDetail = app(BankDetailRepository::class);
	    $this->companyId = $companyId;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
    	// ToDo: Validate Account: Check if Same has been stored before
	    if ((new CheckIfBankExistJob($this->companyId, $this->data))->handle()->count()) {
	    	return $this->createJobResponse('error', 'You already have this account number linked to your account', null);
	    }
		$this->data['company_id'] = $this->companyId;
	    return $this->bankDetail->fillAndSave($this->data) ? true : false;
    }
}
