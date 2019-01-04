<?php

namespace App\Domains\Sale\Jobs;

use App\Data\Repositories\UserRepository;
use Lucid\Foundation\Job;

class AddSaleJob extends Job
{

	/**
	 * @var \Illuminate\Foundation\Application|UserRepository
	 */
	private $user;

	/**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $userId)
    {
        $this->userId = $userId;
        $this->user = app(UserRepository::class);
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $this->user->find($this->userId)->delete();
    }
}
