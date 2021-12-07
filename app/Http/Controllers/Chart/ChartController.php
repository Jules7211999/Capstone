<?php

namespace App\Http\Controllers\Chart;

use Carbon\Carbon;
use App\Models\city;
use App\Models\fish;
use App\Models\User;
use App\Models\barang;
use App\Models\Months;
use App\Charts\Individual;
use App\Models\Coordinates;
use App\Models\EmergencyCall;
use App\Http\Controllers\Controller;

class ChartController extends Controller
{
    public $bid;
    public $fid;

    public function all(){
       
        $sos = EmergencyCall:: whereMonth('created_at', date('m'))
        ->whereYear('created_at', date('Y'))->with('user')->get();
        $coordinates = Coordinates::whereMonth('created_at', date('m'))
        ->whereYear('created_at', date('Y'))->with('user')->get();
        $fish = fish::all();
        $municipality = city::all();
        $barangay = barang::with('city')->get();
        $admin = User::where('role','=','Admin')->with(['city','barangay'])->get();
        $fisherman = User::where('role','=','User')->with(['city','barangay'])->get();
        
        
       
        return view('Superuser.Report.report',['fisherman'=> $fisherman, 'admin' => $admin, 'fish'=> $fish,'coord'=> $coordinates,'sos'=>$sos,'barangay'=> $barangay, 'city' => $municipality]);
    }

    public function individual( $fid,$bid, Individual $chart){
        $this->bid = $bid;
        $this->fid = $fid;
         
        $months =array();
        $sum = array();
       
        
        $data = Months::has('catch')->with(['catch'=> function ($query){
            $query->where('barangay_id','=',$this->bid)->where('fish_id','=',$this->fid);
        }])->withSum(['catch' => function ($query){
            $query -> where('barangay_id','=',$this->bid)->where('fish_id','=',$this->fid);
        }],'kilos')->get();

        $fish = fish::find($fid);

       foreach($data as $d){
         array_push($months,$d->name);
       }
       foreach($data as $h){
           array_push($sum ,$h->catch_sum_kilos);
       }
    
     
      
        return view('Superuser.Monitor.main_monitor',['months' => $months,'sum' => $sum, 'fish' => $fish ,'chart' => $chart->build($months,$sum)]);

       
        
    }
}
