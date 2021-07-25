<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserRegistercontroller extends Controller
{
    public function index(){
        return view('user.register');
    }
}
