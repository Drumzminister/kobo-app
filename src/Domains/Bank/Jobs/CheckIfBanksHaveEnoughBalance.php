<?php

namespace App\Domains\Bank\Jobs;

use App\Data\Repositories\BankDetailRepository;
use Koboaccountant\Traits\HelpsResponse;
use Lucid\Foundation\Job;

class CheckIfBanksHaveEnoughBalance extends Job
{
	use HelpsResponse;

	/**
	 * @var array
	 */
	private $paymentMethods;

	/**
	 * @var \Illuminate\Foundation\Application|BankDetailRepository
	 */
	private $bank;

	/**
	 * Create a new job instance.
	 *
	 * @param array $banks
	 */
    public function __construct(array $banks)
    {
	    $this->paymentMethods = $banks;
	    $this->bank           = app(BankDetailRepository::class);
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
    	foreach ($this->paymentMethods as $method)  {
    		$bank = $this->bank->findOnly('id', $method['id']);
    		if ($bank) {
    			if ($bank->account_balance < $method['amount']) {
				    return $this->createJobResponse('error', "Insufficient Balance for $bank->bank_name.", $bank);
			    }
		    }

		    return $this->createJobResponse('error', "The bank selected does not exist.", $bank);
	    }

	    return $this->createJobResponse('success', "Balance is sufficient for all accounts.", $this->paymentMethods);
    }
}
