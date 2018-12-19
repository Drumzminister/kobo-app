<?php

namespace Koboaccountant\Http\Controllers;

//use Illuminate\Http\Request;
use Koboaccountant\Repositories\Profile\ProfileRepository;

class ClientController extends Controller
{
    protected $client_repo;
    public function __construct()
    {
        $this->client_repo = new ProfileRepository();
    }

    public function getId ()
    {
        return response()->json([
            'id'    =>  $this->client_repo->getId(),
        ], 200);
    }
}
