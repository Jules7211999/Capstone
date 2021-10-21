<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class GetUser extends Controller
{
    public function index(){
        
        if(auth()->user()->role == "SuperUser"){
            return User::where('role','=','User')->get();
        }else{
            return User::where('role','=','User')->where('barangay','=',auth()->user()->barangay)->get();
        }
    }
}
