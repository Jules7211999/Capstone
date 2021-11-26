<?php

namespace App\Http\Controllers\Chart;

use App\Models\city;
use App\Models\fish;
use App\Models\User;
use App\Models\barang;
use App\Models\Months;
use App\Models\FishCatch;
use App\Charts\Individual;
use App\Models\Coordinates;
use App\Models\EmergencyCall;
use App\Http\Controllers\Controller;

class ChartController extends Controller
{
    public $bid;
    public $fid;

    public function all(){
        
        $totalkilos = FishCatch::sum('kilos');
        $user = User::where('role','=','Superuser')->count();
        $admin = User::where('role','=','Admin')->count();
        $fisherman = User::where('role','=','User')->count();
        $coord = Coordinates::all()->count();
        $sos = EmergencyCall::all()->count();
        $sosd = EmergencyCall::where('status','=','Done')->count();
        $sosp = EmergencyCall::where('status','=','Processing')->count();
        $barangay = barang::all()->count();
        $city = city::all()->count();
        $fish = fish::all()->count();

        return view('Superuser.Report.all',['user' => $user, 'fisherman' => $fisherman, 'admin' => $admin,'sos' => $sos,'sosd' => $sosd, 'sosp' => $sosp, 'coord' => $coord,'barangay' => $barangay,'city'=>$city 
        ,'tkilos' => $totalkilos, 'fish' => $fish, 
        ]);
    }

    public function individual( $fid,$bid, Individual $chart){
        $this->bid = $bid;
        $this->fid = $fid;
         
        $months =array();
        $sum = array();
       

        $data = Months::has('catch')->with(['catch'=> function ($query){
            $query->where('barangay_id','=',$this->bid)->where('fish_id','=',$this->fid);
        }])->withSum(['catch' => function ($query){
            $query -> where('fish_id','=',$this->fid);
        }],'kilos')->get();

        $fish = fish::find($fid);

        $fishname = $fish->common_name;
      

       foreach($data as $d){
         array_push($months,$d->name);
       }
       foreach($data as $h){
           array_push($sum ,$h->catch_sum_kilo);
       }
        
      
        return view('Superuser.Monitor.main_monitor',['months' => $months,'sum' => $sum, 'fish' => $fish ,'chart' => $chart->build($months,$sum,$fishname)]);

       
        
    }
}
