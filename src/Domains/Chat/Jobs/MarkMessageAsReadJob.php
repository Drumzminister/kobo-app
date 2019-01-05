<?php

namespace App\Domains\Chat\Jobs;

use Chat;
use Lucid\Foundation\Job;
use Koboaccountant\Models\User;

class MarkMessageAsReadJob extends Job
{
	private $messageId;
	/**
	 * @var User
	 */
	private $user;

	/**
	 * Create a new job instance.
	 *
	 * @param User $user
	 * @param      $messageId
	 */
    public function __construct(User $user, $messageId)
    {
	    $this->messageId = $messageId;
	    $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        return Chat::message($this->getMessage())->for($this->user)->markRead();
    }

    private function getMessage()
    {
	    return Chat::messages()->getById($this->messageId);
    }
}
