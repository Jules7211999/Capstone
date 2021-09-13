<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class GetUser extends Controller
{
    public function index(){
        
        return User::where('role','=','User')->get();
    }
}
