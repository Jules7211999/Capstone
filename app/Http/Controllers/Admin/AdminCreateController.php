<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminCreateController extends Controller
{
    public function index(Request $request){
        
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|max:255',
            'phone_number' => 'required',
            'gender' => 'required',
            'birthdate' => 'required',
            'password' => 'required|confirmed|min:8',
            'username' => 'required|unique:App\Models\User,username',
        ]);

         User::create([
            'name' => $request->name,
            'phone' => $request->phone_number,
            // 'password' => Hash::make($request->password),
            'password' => $request->password,
            'role' => "Admin",
            'address'=> $request->address,
            'gender' => $request->gender,
            'date' => $request-> birthdate,
            'username' => $request->username
        ]);

        return redirect()->back()->with('message','User Registered');
    }
}
