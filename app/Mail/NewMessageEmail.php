<?php

namespace Koboaccountant\Mail;

use App\Config\MailConfig;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewMessageEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    /**
     * @var User
     */
    private $user;
    private $message;

    /**
     * Create a new message instance.
     *
     * @param User $user
     * @param      $message
     */
    public function __construct($user, $message)
    {
        $this->user = $user;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(MailConfig::getConfig('SUPPORT_EMAIL'), MailConfig::getConfig('SUPPORT_EMAIL_NAME'))
            ->subject(MailConfig::getConfig('NEW_MESSAGE_SUBJECT'))
            ->markdown('email.new-message')
            ->with([
                'user' => $this->user,
                'message' => $this->message,
            ]);
    }
}
