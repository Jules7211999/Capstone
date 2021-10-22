<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminSearchTrashController extends Controller
{
    public function index(Request $request){
        $search = User::onlyTrashed()->where('role','=','Admin')->where('name','LIKE','%'.$request->search.'%')
        ->get();

       return $search;
    }
}
