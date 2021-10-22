<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserTrashController extends Controller
{
    public function index(){
        return view('Superuser.userTrash');
    }


        public function restore(Request $request){
            
            $user = User::onlyTrashed()->find($request->userId);
            $user->restore;
            return "success";
            
        }
    
}
