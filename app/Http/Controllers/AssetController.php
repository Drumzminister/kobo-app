<?php

namespace Koboaccountant\Http\Controllers;

use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index()
    {
        return view('asset');
    }

    public function openingAsset()
    {
        return view('opening-asset');
    }
}
