<?php

namespace App\Http\Controllers\Get;

use App\Models\User;
use App\Models\EmergencyCall;
use App\Http\Controllers\Controller;

class GetSos extends Controller
{

    public function get(){
        return User::where('status','=','Waiting')->has('emergencyCall')->with('emergencyCall')->get();
    }
    public function waiting(){
       
        $user = EmergencyCall::where('status','=','Waiting')->with('user')->get();
        return $user;
    }

    public function processing(){
       
        $user = EmergencyCall::where('status','=','Processing')->with('user')->get();
        return $user;
    }
    public function done(){

        $user = EmergencyCall::where('status','=','Done')->with('user')->get();
        return $user;
       
    }

    public function canceled(){
        $user = EmergencyCall::where('status','=','Canceled')->with('user')->get();
        return $user;
    }

}
