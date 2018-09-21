<?php

namespace Koboaccountant\Http\Controllers;

use Illuminate\Http\Request;
use Koboaccountant\Repositories\UserRepository;

class UserController extends Controller
{
    public function index()
    {
        return view('welcome');
    }    
}
