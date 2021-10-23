<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Coordinates;
use App\Models\EmergencyCall;
use Illuminate\Foundation\Auth\User;

class Dashboard extends Controller
{
    public function index(){
        $emailVerified = User::where("email_verified_at","!=",null)->count();
        $user = User::all()->count();
        $coord = Coordinates::all()->count();
        $sos = EmergencyCall::all()->count();

        return view('Superuser.dashboard',['email'=>$emailVerified, 'user'=>$user, 'coord' => $coord, 'sos' => $sos]);
    }
}
