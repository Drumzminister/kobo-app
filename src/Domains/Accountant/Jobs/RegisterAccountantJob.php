<?php

namespace App\Domains\Accountant\Jobs;

use App\Data\Repositories\AccountantRepository;
use Lucid\Foundation\Job;

class RegisterAccountantJob extends Job
{
	/**
	 * Accountant Repository Object
	 *
	 * @var \Illuminate\Foundation\Application|AccountantRepository
	 */
	private $accountant;

	/**
	 * New Accountant Data
	 *
	 * @var array
	 */
	private $data;

	/**
	 * Create a new job instance.
	 *
	 * @param $data
	 */
    public function __construct($data)
    {
    	$this->data = $data;
        $this->accountant = app(AccountantRepository::class);
    }

	/**
	 * Execute the job.
	 * @throws \Exception
	 */
    public function handle()
    {
        $accountant = $this->accountant->fillAndSave($this->data);
        return $accountant;
    }
}
