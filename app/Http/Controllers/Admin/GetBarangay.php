<?php

namespace App\Http\Controllers\Admin;

use App\Models\barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\city;

class GetBarangay extends Controller
{
    public function index(){
       return barang::where('status','=','Active')->with('city')->get(); 
    }
    
    public function inactive(){
        return barang::where('status','=','Inactive')->with('city')->get();
    }

    public function dropdown($id){
        return barang::where('city_id','=',$id)->get();
    }
}
