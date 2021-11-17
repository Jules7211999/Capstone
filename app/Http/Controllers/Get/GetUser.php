<?php

namespace App\Http\Controllers\Get;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class GetUser extends Controller
{
    public function index(){
        
        if(auth()->user()->role == "SuperUser"){
            return User::where('role','=','User')->get();
        }else{
            return User::where('role','=','User')->where('barangay_id','=',auth()->user()->barangay_id)->get();
        }
    }
}
