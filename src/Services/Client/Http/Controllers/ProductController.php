<?php

namespace App\Services\Client\Http\Controllers;

use App\Services\Client\Features\AddProductFeature;
use App\Services\Client\Features\AddProductImageFeature;
use App\Services\Client\Features\ShowAddProductFeature;
use Illuminate\Http\Request;
use Lucid\Foundation\Http\Controller;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function addProductPage()
    {
        return $this->serve(ShowAddProductFeature::class);
    }
    public function addProduct()
    {
        return $this->serve(AddProductFeature::class);
    }
    public function addProductImage()
    {
        return $this->serve(AddProductImageFeature::class);
    }
}
