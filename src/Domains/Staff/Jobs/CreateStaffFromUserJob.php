<?php

namespace App\Domains\Staff\Jobs;

use App\Data\Repositories\StaffRepository;
use Illuminate\Support\Facades\Mail;
use Koboaccountant\Mail\NewStaffCreated;
use Koboaccountant\Models\User;
use Lucid\Foundation\Job;
use StoreHouse\Domains\Notification\Jobs\NotifyUserJob;

class CreateStaffFromUserJob extends Job
{
    /**
     * @var User
     */
    private $user;

    /**
     * @var \Illuminate\Foundation\Application|StaffRepository
     */
    private $staff;

    /**
     * Create a new job instance.
     *
     * @param $user
     */
    public function __construct($user)
    {
        $this->user = $user;
        $this->staff = app(StaffRepository::class);
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $data = [
            'first_name' => $this->user->first_name,
            'last_name' => $this->user->last_name,
            'email' => $this->user->email,
            'company_id' => $this->user->getUserCompany()->id,
            'user_id' => $this->user->id,
        ];

        $staff = $this->staff->fillAndSave($data);

        if ($staff) {
            Mail::to($this->user->email)->queue((new NewStaffCreated($this->user, $this->getMessage()))->onQueue(AppQueues::MAIL));
        }
    }

    /**
     * @return string
     */
    protected function getMessage(): string
    {
        return 'Your Staff Account has been created on Kobo Accountant.';
    }
}
