<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MobileProfile extends Controller
{
    public function index($id){
        $user = User::find($id);
        return response()->json([
            
            'name' => $user->name,
            'username' => $user->username,
            'marital_status' => $user->marital_status,
            'phone_number' => $user->phone_number,
            'profile_image' => $user->profile_image,
            'gender' => $user->gender,
            'birthdate' => $user->birthdate,
            'address' => $user->address,
            'city' => $user->city->name,
            'barangay' => $user->barangay->name 

        ]);
    }
}
