<?php

namespace App\Services\Accountant\Http\Controllers;

use Illuminate\Http\Request;
use Lucid\Foundation\Http\Controller;

class ResourceController extends Controller
{
    public function ShowResourcePages(){
    return $this->serve(\App\Services\Accountant\Features\ViewResourcesPageFeature::class);
    }
}
