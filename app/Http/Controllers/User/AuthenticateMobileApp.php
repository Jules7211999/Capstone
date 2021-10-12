<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthenticateMobileApp extends Controller
{
    public function index(Request $request){

        return response()->json([
            "username" => $request->username,
            "password" => $request->password
        ]);
    }
}
