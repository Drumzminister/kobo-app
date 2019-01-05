<?php
/**
 * Created by James John James
 * User: James
 * Date: 11/22/2018
 * Time: 7:02 PM
 */

namespace Koboaccountant\Repositories\Auth;

use Illuminate\Support\Facades\Hash;
use Koboaccountant\Jobs\ConfirmEmailRegistration;
use Koboaccountant\Models\Accountant;
use Koboaccountant\Models\VerifyUser;
use Koboaccountant\Repositories\BaseRepository;

class AccountantRepository extends BaseRepository
{
    public function createUser($data)
    {
        // Request has been created for validation

        $user = Accountant::create([
            'id' => $this->generateUuid(),
            'first_name' => ucfirst($data->first_name),
            'last_name' => ucfirst($data->last_name),
            'email' => strtolower($data->email),
            'password' => Hash::make($data->password),
            'isActive' => 0,
        ]);
        // Added User to a Role


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
}
