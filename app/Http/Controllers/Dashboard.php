<?php

namespace App\Http\Controllers;

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
        
        $user = User::where('role','=','Superuser')->count();
        $admin = User::where('role','=','Admin')->count();
        $fisherman = User::where('role','=','User')->count();
        $coord = Coordinates::all()->count();
        $sos = EmergencyCall::all()->count();
        $sosd = EmergencyCall::where('status','=','Done')->count();
        $sosp = EmergencyCall::where('status','=','Processing')->count();
        $barangay = barang::all()->count();
        $city = city::all()->count();
        $fish = fish::all()->count();


        return view('Superuser.dashboard',['user' => $user, 'fisherman' => $fisherman, 'admin' => $admin,'sos' => $sos,'sosd' => $sosd, 'sosp' => $sosp, 'coord' => $coord,'barangay' => $barangay,'city'=>$city]);
    }
}
