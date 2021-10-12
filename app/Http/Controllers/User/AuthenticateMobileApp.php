<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthenticateMobileApp extends Controller
{
    public function index(Request $request){

       $request-> validate([
            'username' => 'exists:App\Models\User,username|required',
            'password' => 'required'
       ]);

       $credentials = $request->only('username', 'password');

       if (Auth::attempt($credentials)) {
           $User = User::where('username',$request->username)->get();

        return response()->json([
            "message" => "true",
            "id" => "$User->id",
            "name" => "username",
            "username" => "name"
        ]);
       }   
    }
}
