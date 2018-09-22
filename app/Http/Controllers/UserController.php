<?php

namespace Koboaccountant\Http\Controllers;

use Illuminate\Http\Request;
use Koboaccountant\Repositories\UserRepository;
use Koboaccountant\Repositories\BaseRepository;

class UserController extends Controller
{
    public function index()
    {
        return view('welcome');
    }    
}
