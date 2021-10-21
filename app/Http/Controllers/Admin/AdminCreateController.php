<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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
            'email' => 'required|unique:App\Models\User,email',
            'barangay' => 'required'
        ]);

         User::create([
            'name' => $request->name,
            'phone' => $request->phone_number,
            'password' => Hash::make($request->password),
            'address'=> $request->address,
            'gender' => $request->gender,
            'date' => $request-> birthdate,
            'email' => $request->email,
            'barangay' => $request->barangay,
            'role' => "Admin"
        ]);

        return redirect()->back()->with('message','User Registered');
    }
}
