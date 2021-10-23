<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;

use App\Http\Controllers\Controller;
use App\Models\EmergencyCall;

class GetSos extends Controller
{
    public function index(){
       
            if(auth()->user()->role == "SuperUser"){
                $user = EmergencyCall::with('user')->get();

                return $user ->toJson();
            }else{
                return User::where('role','=','User')->where('barangay','=',auth()->user()->barangay)->has("emergencyCall")->with("emergencyCall")->get();
            }
            
        
    }
    
}
