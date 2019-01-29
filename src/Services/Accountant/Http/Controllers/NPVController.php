<?php

namespace App\Services\Accountant\Http\Controllers;

use Illuminate\Http\Request;
use Lucid\Foundation\Http\Controller;

class NPVController extends Controller
{
    public function showNPVPages(){
    return $this->serve(\App\Services\Accountant\Features\showNPVPageFeature::class);
    }

}
