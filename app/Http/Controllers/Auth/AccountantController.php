<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 11/22/2018
 * Time: 7:12 PM
 */

namespace Koboaccountant\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Koboaccountant\Http\Controllers\Controller;
use Koboaccountant\Traits\Accountant;


class AccountantController extends Controller
{
    use Accountant, AuthenticatesUsers;

    protected $redirectTo = '/accountant/dashboard';

    public function guard(){
        return Auth::guard('accountant');
    }
}