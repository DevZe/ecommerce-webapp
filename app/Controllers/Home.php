<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        //GET DATA FROM DB
        return view('welcome_message');
    }

   public function getProduct($product)
   {
        return view('products/productDetails', ['product'=> $product]);
   }

   public function store()
   {
        return view('store');
   }

   public function createUser()
   {
        return view('auth/signup_profile');
   }

}
