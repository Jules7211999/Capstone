<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminSearchController extends Controller
{
    public function index(Request $request){
        $search = User::where('role','=','Admin')->where('name','LIKE','%'.$request->search.'%')
        ->get();

       return $search;
    }
}
