<?php

namespace App\Services\Accountant\Http\Controllers;

use App\Services\Accountant\Features\SendMessageFeature;
use Illuminate\Http\Request;
use Lucid\Foundation\Http\Controller;

class ChatController extends Controller
{
   public function sendMessage()
   {
   	    return $this->serve(SendMessageFeature::class);
   }
}
