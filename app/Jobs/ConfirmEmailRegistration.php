<?php

namespace Koboaccountant\Jobs;

use Koboaccountant\Mail\VerifyMail;
use Mail;
use Koboaccountant\Repositories\Auth\UserRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Console\Presets\React;

class ConfirmEmailRegistration implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // dd($this->user);
        Mail::to($this->user->email)->send(new VerifyMail($this->user));
    }
}
