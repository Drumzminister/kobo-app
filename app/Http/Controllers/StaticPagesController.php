<?php

namespace Koboaccountant\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class StaticPagesController extends Controller
{
    public function index () {
        if (is_null(Auth::user())){
            return view('index');
        }
        return redirect('/dashboard');
    }
}
