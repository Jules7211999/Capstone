<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Coordinates;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetLocation extends Controller
{
    public function index(){
       

        if(auth()->user()->role == "SuperUser"){
            return User::where('role','=','User')->with("coordinates")->get();
        }else{
            return User::where('role','=','User')->where('barangay','=',auth()->user()->barangay)->with("coordinates")->get();
        }
        
    }
}
