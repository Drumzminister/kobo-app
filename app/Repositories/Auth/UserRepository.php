<?php

namespace Koboaccountant\Repositories\Auth;

use Koboaccountant\Models\User;
use Koboaccountant\Models\Role;
use Koboaccountant\Models\UserRole;
use Illuminate\Support\Facades\Hash;
use DB;
use Koboaccountant\Repositories\BaseRepository;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserRepository extends BaseRepository
{
  
    public function __construct (User $user, Role $role) {
        $this->user = $user;
        $this->role = $role;
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

   public function createUser($data, $session = null)
   {
       // Request has been created for validation
       DB::beginTransaction();

       $user = User::create([
           'id' => $this->generateUuid(),
           'first_name' => ucfirst($data->first_name),
           'last_name' => ucfirst($data->last_name),
           'email' => strtolower($data->email),
           'password' => Hash::make($data->password),
           'status' => 1,
           'role_id' => 1,
       ]);
        // Added User to a Role

        $role = new Role;
        $role->user_id = $user->id;
        $user->roles()->save($role);
        // return $user;


       if (!$user) {
           DB::rollback();
           return false;
       }
       DB::commit();

        // $user->save();


   }

   public function users()
   {
       return User::with('roles')->get();
   }
}