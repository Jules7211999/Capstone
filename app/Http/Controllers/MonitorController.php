<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\barang;
use App\Models\fish;
use App\Models\FishCatch;


class MonitorController extends Controller
{

  public $id;

    public function index(){
      history("Visited Monitor Page");
      return view('Superuser.Monitor.index');
    }
    public function subindex($id){

      return view('Superuser.Monitor.subindex',['id'=>$id]);
      
    }
  
    public function main($id){
        return view('Superuser.Monitor.show_monitor',['id' => $id]);
      }

    public function get($id){
      $this->id = $id;
     return fish::with(['catch' => function ($query){
        $query->where('barangay_id','=',$this->id)->with('barangay');
      }])->withSum('catch','kilo')->get();
      
    }
}
