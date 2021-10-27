<?php

namespace App\Http\Controllers\Superuser;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MobileGetProfile extends Controller
{
    public function index($id){
        $user = User::find($id);
        return response()->json([
            $user->name,
            $user->username,
            $user->marital_status,
            $user->profile_image,
            $user->gender,
            $user->birthdate,

        ]);
    }
}
