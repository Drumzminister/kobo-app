<?php

namespace App\Services\Accountant\Http\Controllers;

use Illuminate\Http\Request;
use Lucid\Foundation\Http\Controller;

class ToolkitController extends Controller
{
     public function showToolkitPages(){
    return $this->serve(\App\Services\Accountant\Features\showToolkitPageFeature::class);
    }
}
