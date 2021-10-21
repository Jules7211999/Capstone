<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;

use App\Http\Controllers\Controller;


class GetSos extends Controller
{
    public function index(){
       
            if(auth()->user()->role == "SuperUser"){
                return User::where('role','=','User')->with("emergencyCall")->get();
            }else{
                return User::where('role','=','User')->where('barangay','=',auth()->user()->barangay)->with("EmergencyCall")->get();
            }
            
        
    }
    
}
