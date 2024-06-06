<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        //GET DATA FROM DB
        return view('welcome_message');
    }


}
