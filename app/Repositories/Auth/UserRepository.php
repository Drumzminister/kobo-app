<?php

namespace Koboaccountant\Repositories\Auth;

use Koboaccountant\Jobs\ConfirmEmailRegistration;
use Koboaccountant\Models\VerifyUser;
use Koboaccountant\Models\User;
use Koboaccountant\Models\Role;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Paystack, Auth;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;


use Koboaccountant\Repositories\BaseRepository;


class UserRepository extends BaseRepository
{
    public function __construct (User $user, Role $role) {
        $this->userModel = $user;
        $this->roleModel = $role;
    }

    public function all()
    {
       return $this->users->get();
    }

   public function paginate()
   {
       return $this->users->paginate(5);
   }

   public function getSlug($text)
   {
       return $this->slugIt($text);
   }

    /**
    * Handle a registration request for the application.
    *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */

   public function createUser($data, $session = null)
   {
       // Request has been created for validation

       $user = User::create([
           'id' => $this->generateUuid(),
           'first_name' => ucfirst($data->first_name),
           'last_name' => ucfirst($data->last_name),
           'email' => strtolower($data->email),
           'password' => Hash::make($data->password),
           'isActive' => 0,
       ]);
        // Added User to a Role
        $role = new Role;
        $role->user_id = $user->id;
        $role->name = isset($data->role) ? $data->role : 'Client';
        $user->role()->save($role);

        
        //Verify the user
        $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => sha1(time())
        ]);
        // return Paystack::getAuthorizationUrl()->redirectNow();
        
        //send verification email via jobs
        $job = (new ConfirmEmailRegistration($user))
                ->delay(Carbon::now()->addSeconds(2));
        dispatch($job);
        
        
        return $user;
   }

    public function getUser($id)
    {
        return $this->users->findOrFail($id);
    }

    public function upDateFirstTimeVisit($data)
    {
        Auth::user()->first_time_login = $data['update_first_time_visit']; // Flip the flag to true
        Auth::user()->save();  // By that you tell it to save the new flag value into the users table
        return true;
    }
}