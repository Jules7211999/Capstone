<?php

namespace App\Http\Controllers\Get;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetAdmin extends Controller
{
    public function index(){
        return User::where('role','=','Admin')->get();
    }
    
}