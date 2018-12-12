<?php

namespace App\Domains\Accountant\Jobs;

use App\Data\Repositories\AccountantRepository;
use Illuminate\Foundation\Auth\RegistersUsers;
use Koboaccountant\Repositories\Auth\UserRepository;
use Lucid\Foundation\Job;

class RegisterAccountantJob extends Job
{
	use RegistersUsers;

	/**
	 * Accountant Repository Object
	 *
	 * @var \Illuminate\Foundation\Application|AccountantRepository
	 */
	private $accountant;

	/**
	 * New Accountant Data
	 *
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
	 * @param $data
	 */
    public function __construct($data)
    {
    	$this->data = $data;
        $this->accountant = app(AccountantRepository::class);
        $this->user = app( UserRepository::class);
    }

	/**
	 * Execute the job.
	 * @throws \Exception
	 */
    public function handle()
    {
    	$this->data['role']  = 'Accountant';
    	$user = $this->user->createUser((object) $this->data);
        $accountant = $this->accountant->fillAndSave(array_merge($this->data, ['user_id' => $user->id]));

	    $this->guard()->login($user);

        return $accountant;
    }
}
