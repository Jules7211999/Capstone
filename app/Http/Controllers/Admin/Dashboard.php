<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\barang;
use App\Models\city;
use App\Models\Coordinates;
use App\Models\EmergencyCall;
use App\Models\fish;
use Illuminate\Foundation\Auth\User;

class Dashboard extends Controller
{
    public function index(){
        
        $user = User::all()->count();
        $admin = User::where('role','=','Admin')->count();
        $fisherman = User::where('role','=','User')->count();
        $coord = Coordinates::all()->count();
        $sos = EmergencyCall::all()->count();
        $sosr = EmergencyCall::where('status','=','Done')->count();
        $barangay = barang::all()->count();
        $city = city::all()->count();
        $fish = fish::all()->count();


        return view('Superuser.dashboard',['sosr' => $sosr, 'fish'=> $fish, 'admin' => $admin,'fisherman' => $fisherman, 'user'=>$user, 'coord' => $coord, 'sos' => $sos, 'barangay' => $barangay, 'city' => $city]);
    }
}
