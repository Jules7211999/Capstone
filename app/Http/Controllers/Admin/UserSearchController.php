<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserSearchController extends Controller
{
    public function index(Request $request){
        $search = User::where('role','=','User')->where('name','LIKE','%'.$request->search.'%')
        ->get();

       return $search;
    }
}
