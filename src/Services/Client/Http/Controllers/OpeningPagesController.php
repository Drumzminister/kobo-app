<?php

namespace App\Services\Client\Http\Controllers;

use Illuminate\Http\Request;
use Lucid\Foundation\Http\Controller;

class OpeningPagesController extends Controller
{
    function __construct () {
        $this->middleware('auth');
    }
    
    public function showOpeningPages(){
        return $this->serve(\App\Services\Client\Features\ShowOpeningPagesFeature::class);
    }

}
