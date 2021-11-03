<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;

use App\Http\Controllers\Controller;
use App\Models\EmergencyCall;

class GetSos extends Controller
{
    public function waiting(){
       
            if(auth()->user()->role == "SuperUser"){
                $user = EmergencyCall::where('status','=','Waiting')->with('user')->get();
                return $user;
            }else{
                return User::where('role','=','User')->where('barangay','=',auth()->user()->barangay)->has("emergencyCall")->with("emergencyCall")->get();
            }
            
        
    }
    public function processing(){
       
        if(auth()->user()->role == "SuperUser"){
            $user = EmergencyCall::where('status','=','Processing')->with('user')->get();
            return $user;
        }else{
            return User::where('role','=','User')->where('barangay','=',auth()->user()->barangay)->has("emergencyCall")->with("emergencyCall")->get();
        }   
    }
    public function done(){
       
        if(auth()->user()->role == "SuperUser"){
            $user = EmergencyCall::where('status','=','Done')->with('user')->get();
            return $user;
        }else{
            return User::where('role','=','User')->where('barangay','=',auth()->user()->barangay)->has("emergencyCall")->with("emergencyCall")->get();
        }   
    }

}
