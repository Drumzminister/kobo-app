<?php

namespace App\Domains\Chat\Jobs;

use Chat;
use Lucid\Foundation\Job;
use Koboaccountant\Models\User;

class LoadMessagesInConversationJob extends Job
{
	private $conversationId;
	/**
	 * @var User
	 */
	private $user;

	/**
	 * Create a new job instance.
	 *
	 * @param User $user
	 * @param      $conversationId
	 */
    public function __construct(User $user, $conversationId)
    {
	    $this->conversationId = $conversationId;
	    $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
		return Chat::conversation($this->getConversation())->for($this->user)->getMessages();

    }

	private function getConversation()
	{
		return Chat::conversations()->getById($this->data['conversation_id']);
	}
}
