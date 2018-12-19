<?php

namespace App\Domains\Chat\Jobs;

use Lucid\Foundation\Job;

class CreateConversationJob extends Job
{
	/**
	 * @var
	 */
	private $user1;

	/**
	 * @var
	 */
	private $user2;

	/**
	 * Create a new job instance.
	 *
	 * @param $user1
	 * @param $user2
	 */
    public function __construct($user1, $user2)
    {
	    $this->user1 = $user1;
	    $this->user2 = $user2;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        return Chat::createConversation([$this->user1, $this->user2]);
    }
}
