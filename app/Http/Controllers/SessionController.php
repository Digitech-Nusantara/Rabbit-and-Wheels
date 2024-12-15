<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index ()
    {
        return view("sesi/index");
    }

    public function logiin (Request $request) 
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],);
    }
}
