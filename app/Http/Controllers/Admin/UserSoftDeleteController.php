<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserSoftDeleteController extends Controller
{
    public function index(Request $request){

        $user = User::find($request->userId);
        $user->delete();

    }
}