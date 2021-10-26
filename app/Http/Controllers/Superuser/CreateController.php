<?php

namespace App\Http\Controllers\Superuser;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class CreateController extends Controller
{
    public function admin(Request $request){
        
    
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|max:255',
            'phone_number' => 'required|numeric',
            'gender' => 'required',
            'birthdate' => 'required',
            'password' => 'required|confirmed|min:8',
            'email' => 'required|unique:App\Models\User,email',
            'barangay' => 'required'
        ]);

         User::create([
            'name' => $request->name,
            'birthdate' => $request->birthdate,
            'phone' => $request->phone_number,
            'password' => Hash::make($request->password),
            'address'=> $request->address,
            'gender' => $request->gender,
            'date' => $request-> birthdate,
            'email' => $request->email,
            'barangay' => $request->barangay,
            'phone_number' => $request->phone_number,
            'role' => "Admin"
        ]);

        return redirect()->back()->with('message','User Registered');
    }

    public function user(Request $request){
        
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|max:255',
            'phone_number' => 'required',
            'gender' => 'required',
            'birthdate' => 'required',
            'password' => 'required|confirmed|min:8',
            'username' => 'required|unique:App\Models\User,username',
            'barangay' => 'required'
        ]);

         User::create([
            'name' => $request->name,
            'phone' => $request->phone_number,
            // 'password' => Hash::make($request->password),
            'password' => $request->password,
            'role' => "User",
            'address'=> $request->address,
            'gender' => $request->gender,
            'date' => $request-> birthdate,
            'phone_number' => $request->phone_number,
            'username' => $request->username,
            'barangay' => $request->barangay
        ]);

        return redirect()->back()->with('message','User Registered');
    }
}
