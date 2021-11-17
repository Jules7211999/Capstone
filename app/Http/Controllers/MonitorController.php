<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\barang;
use App\Models\FishCatch;

class MonitorController extends Controller
{
    public function index(){
      return view('Superuser.Monitor.index');
    }
    public function subindex($id){
      return view('Superuser.Monitor.subindex',['id'=>$id]);
      
    }
    public function main($id){
      // return view('Superuser.Monitor.show_monitor',['id' => $id]);
      return barang::where('id','=',$id)->with('catch.fish')->get();
      
    }
    public function getCatch(){
        return FishCatch::with(['barangay','fish'])->get();
    }

}
