<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Coordinates;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetLocation extends Controller
{
    public function index(){
       

        if(auth()->user()->role == "SuperUser"){
            return Coordinates::with('user')->get();
        }else{
            return Coordinates::with('user')->get();
        }
    }
}
