<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
class SalesController extends BaseController
{
    public function getSales(): string
    {
        return view('store');
    }


}