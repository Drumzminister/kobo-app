<?php

namespace App\Domains\Chat\Jobs;

use App\Data\Repositories\UserRepository;
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
	 * @var \Illuminate\Foundation\Application|UserRepository
	 */
	private $user;

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
	    $this->user = app(UserRepository::class);
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
    	// We'll attempt to create a new conversation if there's no existing conversation between the two user
    	$conversation = Chat::conversations()->between($this->sender, $this->user->find($this->data['recipient_id']));

    	return $conversation ? $conversation : $this->createNewConversation();

//    	return Chat::conversations()->getById($this->data['conversation_id']);
    }

    private function createNewConversation()
    {
    	return (new CreateConversationJob($this->sender, $this->user->find($this->data['recipient_id'])))->handle();
    }
}
