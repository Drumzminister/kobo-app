<?php

namespace App\Domains\Chat\Jobs;

use Koboaccountant\Models\User;
use Lucid\Foundation\Job;
use Chat;

/**
 * Class LoadConversationsJob
 * @package App\Domains\Chat\Jobs
 */
class LoadConversationsJob extends Job
{
	/**
	 * @var User
	 */
	private $user;
	/**
	 * @var int
	 */
	private $limit;

	/**
	 * Create a new job instance.
	 *
	 * @param User $user
	 * @param int  $limit
	 */
    public function __construct(User $user, $limit = 10)
    {
	    $this->user = $user;
	    $this->limit = $limit;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        return Chat::conversations()->for($this->user)->get();
    }
}
