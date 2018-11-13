<?php

namespace Koboaccountant\Http\Controllers;
use Koboaccountant\Http\Requests\UserRegistration;
use Koboaccountant\Repositories\Auth\UserRepository;
use Illuminate\Http\Request;
use Koboaccountant\Repositories\BaseRepository;
use Auth;
use Koboaccountant\Models\User;

class UserController extends Controller
{
    public function home()
    {
        return view('index');
    }

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }
    
    public function started()
    {
        return view('get-started');
    }
    
    public function create(UserRegistration $request)
    {
        $user = $this->user->createUser($request);

        return 'Check your mail for verification';
    }

    public function login()
    {
        return view('auth.login');
    }
 
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }

    public function upDateFirstTimeVisit(Request $request)
    {
        $this->user->upDateFirstTimeVisit($request);
        return response()->json(array('msg'=> request()->all()), 200);
    }

}
