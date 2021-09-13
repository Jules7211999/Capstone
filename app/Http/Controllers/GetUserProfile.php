<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetUserProfile extends Controller
{
    public function index(){

        return auth()->user();
    }
}
