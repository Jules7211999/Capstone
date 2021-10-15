<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthenticateMobileApp extends Controller
{
    public function index(Request $request){


       if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
        return response()->json([
            "message" => "true"
        ]);
    }else{
        return response()->json([
            "message" => "falsed"
        ]);
    }

    //    if (Auth::attempt($credentials)) {
    //     $User = User::where('username',$request->username)->get();

    //     return response()->json([
    //         "message" => "true",
    //         "id" => $User[0]->id,
    //         "name" => $User[0]->name,
    //         "username" => $User[0]->username
    //     ]);
    //    }else{
    //        return response()->json([
    //         "message" => "false"
    //        ]);
    //    }   
    }
}
