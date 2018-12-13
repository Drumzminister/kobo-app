<?php

namespace App\Domains\Bank\Jobs;

use App\Data\Repositories\BankDetailRepository;
use Lucid\Foundation\Job;

class AddBankAccountJob extends Job
{
	private $data;

	/**
	 * @var \Illuminate\Foundation\Application|BankDetailRepository
	 */
	private $bankDetail;

	/**
	 * Create a new job instance.
	 *
	 * @param array $data
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
    	// ToDo: Validate Account: Check if Same has been stored before
	    if ((new CheckIfBankExistJob($this->data))->handle()) {
	    	return [
	    		'status' => 'error',
			    'message' => 'You already have this account number linked to your account',
		    ];
	    }

	    return $this->bankDetail->fillAndSave($this->data) ? true : false;
    }
}
