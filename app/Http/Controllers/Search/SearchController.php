<?php

namespace App\Http\Controllers\Search;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\barang;
use App\Models\city;
use App\Models\fish;

class SearchController extends Controller
{
    public function user(Request $request){
        if($request->type == "Active"){
            $search = User::where('role','=','User')->where('name','LIKE','%'.$request->search.'%')
            ->get();
        }else{
            $search = User::onlyTrashed()->where('role','=','User')->where('name','LIKE','%'.$request->search.'%')
            ->get();
        }
       return $search;
    }
  


    public function admin(Request $request){
         if($request->type == "Active"){
            $search = User::where('role','=','Admin')->where('name','LIKE','%'.$request->search.'%')
            ->get();
        }else{
            $search = User::onlyTrashed()->where('role','=','Admin')->where('name','LIKE','%'.$request->search.'%')
            ->get();
        }
       

       return $search;
    }


    public function fish(Request $request){
        $search = fish::where('common_name','LIKE','%'.$request->search.'%')->orwhere('local_name','LIKE','%'.$request->search.'%')
        ->get();

       return $search;
    }

    public function municipality(Request $request){
      
            $search = city::where('name','LIKE','%'.$request->search.'%')->where('status','=',$request->status)
        ->get();

       return $search;
    }
    

    public function barangay(Request $request){
        $search = barang::where('name','LIKE','%'.$request->search.'%')->where('status','=',$request->status)
        ->with('city')->get();

       return $search;
    }
   
 
}
