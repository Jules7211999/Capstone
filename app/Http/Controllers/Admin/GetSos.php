<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmergencyCall;
use Illuminate\Http\Request;

class GetSos extends Controller
{
    public function index(){
        $user = EmergencyCall::with('user')->get();
        return $user;    
    }
    
}
