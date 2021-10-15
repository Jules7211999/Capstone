<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthenticateMobileApp extends Controller
{
    public function index(Request $request){

      return response()->json([
          "message" => "true"
      ]);
    }
}
