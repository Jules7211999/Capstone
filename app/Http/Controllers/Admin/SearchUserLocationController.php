<?php

namespace App\Http\Controllers\Admin;

use App\Models\Coordinates;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchUserLocationController extends Controller
{
    public function index(Request $request){
        $search =  Coordinates::where('name','LIKE','%'.$request->search.'%')->with("user")->get();

        return $search;
        
    }
}
