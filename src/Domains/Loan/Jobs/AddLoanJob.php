<?php

namespace App\Domains\Loan\Jobs;

use App\Data\Repositories\UserRepository;
use Lucid\Foundation\Job;

class AddLoanJob extends Job
{
    /*
     *  @var \Illuminate\Foundation\Application|UserRepository
     * */
    private $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $userId)
    {
        $this->data = $data;
        $this->userId = $userId;
        $this->user = app(UserRepository::class);
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
