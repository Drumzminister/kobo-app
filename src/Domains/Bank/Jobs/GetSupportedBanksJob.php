<?php

namespace App\Domains\Bank\Jobs;

use App\Data\Repositories\SupportedBankRepository;
use Lucid\Foundation\Job;

class GetSupportedBanksJob extends Job
{
	/**
	 * @var \Illuminate\Foundation\Application|SupportedBankRepository
	 */
	private $bank;

	/**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
    	$this->bank = app(SupportedBankRepository::class);
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
    	return $this->bank->all();
    }
}
