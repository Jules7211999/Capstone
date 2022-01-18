<?php

namespace App\Http\Controllers\Get;

use App\Models\barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\city;

class GetBarangay extends Controller
{
    public function index(){
       return barang::where('status','=','Active')->with('city')->orderBy('name')->get(); 
    }
    
    public function inactive(){
        return barang::where('status','=','Inactive')->with('city')->orderBy('name')->get();
    }

    public function dropdown($id){
        return barang::where('city_id','=',$id)->orderBy('name')->get();
    }

    public function monitor($id){
        return city::where('id','=',$id)->with('barang')->orderBy('name')->get();
    }

    public function activeByCity(){
        return barang::where('status','=','Active')->with('city')->orderBy('city_id')->get(); 
    }
    public function inactiveByCity(){
        return barang::where('status','=','Inactive')->with('city')->orderBy('city_id')->get();
    }
}
