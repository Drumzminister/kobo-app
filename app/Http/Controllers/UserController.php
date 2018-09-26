<?php

namespace Koboaccountant\Http\Controllers;
use Koboaccountant\Http\Requests\UserRegistration;
use Koboaccountant\Repositories\Auth\UserRepository;
use Illuminate\Http\Request;
use Koboaccountant\Repositories\BaseRepository;



class UserController extends Controller
{
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }
    public function index()
    {
        return view('welcome');
    }
    
    public function create(UserRegistration $request)
    {

        $user = $this->users->createUser($request);

        return 'Check your mail for verification';
    }

    public function users() {
        return $this->users->users();
    }

    public function client()
    {
        return view('client');
    }

    public function accountant()
    {
        return view('accountant');
    }

}
