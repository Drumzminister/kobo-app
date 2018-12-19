<?php

namespace App\Domains\Chat\Jobs;

use Koboaccountant\Models\User;
use Lucid\Foundation\Job;
use Chat;

class SendMessageJob extends Job
{
	/**
	 * @var User
	 */
	private $sender;
	/**
	 * @var array
	 */
	private $data;

	/**
	 * Create a new job instance.
	 *
	 * @param User $sender
	 * @param array  $data
	 */
    public function __construct(User $sender, array $data)
    {
	    $this->sender = $sender;
	    $this->data   = $data;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
    	// ToDO: There should be a event fired when a message has been sent
        return Chat::message($this->data['message'])->from($this->sender)->to($this->getConversation());
    }

    private function getConversation()
    {
    	return Chat::conversations()->getById($this->data['conversation_id']);
    }
}
