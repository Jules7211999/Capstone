<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminTrashController extends Controller
{
    public function index(){
        return view('Superuser.adminTrash');
    }

    public function restore(Request $request){
            
        $user = User::onlyTrashed()->find($request->userId);
        $user->restore;
        
        
    }
}
