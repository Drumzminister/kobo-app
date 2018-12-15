<?php

namespace App\Domains\Accountant\Jobs;

use App\Data\Repositories\AccountantRepository;
use Lucid\Foundation\Job;

class UpdateAccountantProfileJob extends Job
{
	/**
	 * @var array
	 */
	private $data;

	/**
	 * @var \Illuminate\Foundation\Application|AccountantRepository
	 */
	private $accountant;
	/**
	 * @var string
	 */
	private $accountantId;

	/**
	 * Create a new job instance.
	 *
	 * @param string $accountantId
	 * @param array  $data
	 */
    public function __construct(string $accountantId, array $data)
    {
	    $this->data = $data;
	    $this->accountant = app(AccountantRepository::class);
	    $this->accountantId = $accountantId;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        return $this->accountant->find($this->accountantId)
                                ->fill($this->data)
                                ->save();
    }
}
