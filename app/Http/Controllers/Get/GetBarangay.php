<?php

namespace App\Http\Controllers\Get;

use App\Models\barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\city;

class GetBarangay extends Controller
{
    public function index(){
       return barang::where('status','=','Active')->groupBy('name')->with('city')->get(); 
    }
    
    public function inactive(){
        return barang::where('status','=','Inactive')->groupBy('name')->with('city')->get();
    }

    public function dropdown($id){
        return barang::where('city_id','=',$id)->get();
    }

    public function monitor($id){
        return city::where('id','=',$id)->with('barang')->get();
    }
}
