<?php

namespace App\Http\Controllers\Get;

use App\Models\User;
use App\Http\Controllers\Controller;

class GetLocation extends Controller
{
    public function index(){
            return User::has('coordinates')->with('coordinates')->get();
    }
}

