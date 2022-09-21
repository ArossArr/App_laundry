<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('dashboard');
    }
    public function uji()
    {
        return view('laundry');
    }
     public function ujicoba()
     {
        return view('coba');
     }
}
