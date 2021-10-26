<?php

namespace App\Http\Controllers\Superuser;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function user(Request $request){
        $search = User::where('role','=','User')->where('name','LIKE','%'.$request->search.'%')
        ->get();

       return $search;
    }

    public function admin(Request $request){
        $search = User::where('role','=','Admin')->where('name','LIKE','%'.$request->search.'%')
        ->get();

       return $search;
    }
}
