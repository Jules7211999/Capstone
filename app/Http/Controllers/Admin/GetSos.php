<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\EmergencyCall;
use App\Http\Controllers\Controller;

class GetSos extends Controller
{

    public function get(){
        return User::has('emergencyCall')->with('emergencyCall')->get();
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

}
