<?php

namespace App\Domains\Chat\Jobs;

use Lucid\Foundation\Job;

class LoadMessagesInConversationJob extends Job
{
	private $conversationId;

	/**
	 * Create a new job instance.
	 *
	 * @param $conversationId
	 */
    public function __construct($conversationId)
    {
	    $this->conversationId = $conversationId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
    }
}
