<?php

namespace Koboaccountant\Repositories;

use Uuid;
use Illuminate\Support\Facades\Auth;

class BaseRepository {


    public function generateUuid()
    {
        return Uuid::generate(5,str_random(5), Uuid::NS_DNS);
    }

    public function slugIt($text)
    {
        return str_replace('--', '-', strtolower(preg_replace('/[^a-zA-Z0-9]/', '-', trim($text))));  
    }

    public function authUserId()
    {
        return Auth::id();
    }

    public function awsUpload($attachment) 
    {
        // cache the file
        $file = $request->file($attachment);

        // generate a new filename. getClientOriginalExtension() for the file extension
        $filename = 'kobo-app-attachment' . time() . '.' . $file->getClientOriginalExtension();

        // save to storage/app/photos as the new $filename
        $path = $file->storeAs('attachment', $filename);

        return;
    }
}