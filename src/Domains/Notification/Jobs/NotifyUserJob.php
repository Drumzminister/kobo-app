<?php
namespace StoreHouse\Domains\Notification\Jobs;

use Koboaccountant\Mail\NewMessageEmail;
use Koboaccountant\StoreHouse\AppQueues;
use App\User;
use Illuminate\Support\Facades\Mail;
use Lucid\Foundation\Job;

class NotifyUserJob extends Job
{
    private $user;
    private $message;

    /**
     * Create a new job instance.
     *
     * @param $user
     * @param $message
     */
    public function __construct($user, $message)
    {
        $this->user = $user;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // ToDo: Implement other means of Notifications here. Maybe push, or save in the database or something close to all that.
        Mail::to($this->user->email)->queue((new NewMessageEmail($this->user, $this->message))->onQueue(AppQueues::NEW_USER_EMAIL));
    }
}
