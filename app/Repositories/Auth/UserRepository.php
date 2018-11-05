<?php

namespace Koboaccountant\Repositories\Auth;

use Koboaccountant\Jobs\ConfirmEmailRegistration;
use Koboaccountant\Models\VerifyUser;
use Koboaccountant\Models\User;
use Koboaccountant\Models\Role;
use Illuminate\Support\Facades\Hash;
use DB, Mail;
use Koboaccountant\Repositories\BaseRepository;
use Symfony\Component\Console\Question\ConfirmationQuestion;

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
           'isActive' => 1,
       ]);
        // Added User to a Role
        $role = new Role;
        $role->user_id = $user->id;
        $user->roles()->save($role);

        $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => sha1(time())
        ]);

        //send verification email via jobs
        $emailJob = (new ConfirmationEmailRegistration())->delay(Carbon::now()->addSeconds(3));
        dispatch($emailJob);
           

        return $user;

       if (!$user) {
           return false;
       }
   }

    public function getUser($id)
    {
        return $this->users->findOrFail($id);
    }

}