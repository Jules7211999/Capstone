<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthenticateMobileApp extends Controller
{
    public function index(Request $request){

        $auth = User::where('username',$request->username)->get();
        
        if($auth[0]->password == $request->password){
            return response()->json([
                "message" => "true",
                "username" => $auth[0]->username,
                "name" => $auth[0]->name,
                "id" => $auth[0]->id
                
            ]);
        }else{
            return response()->json([
                "message" => "false"
            ]);
        } 
    }
}
