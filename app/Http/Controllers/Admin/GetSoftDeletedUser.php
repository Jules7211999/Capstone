<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class GetSoftDeletedUser extends Controller
{
    public function index(){
        
        if(auth()->user()->role == "SuperUser"){
            return User::onlyTrashed()->where('role','=','User')->get();
        }else{
            return User::onlyTrashed()->where('role','=','User')->where('barangay','=',auth()->user()->barangay)->get();
        }
    }
}
