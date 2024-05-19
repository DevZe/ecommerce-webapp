<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
class ShopController extends BaseController
{
  
    public function getProducts()
    {
        return view('products/productsDisplay');
    }

    public function getProduct($product): string
    {
        return view('store');
    }

    public function createProduct()
    {
        return view('products/productCreate');
    }

    public function saveProduct(): string
    {
        return view('store');
    }




}