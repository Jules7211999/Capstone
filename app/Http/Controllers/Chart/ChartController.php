<?php

namespace App\Http\Controllers\Chart;

use App\Charts\Individual;
use App\Http\Controllers\Controller;
use App\Models\fish;
use App\Models\Months;

class ChartController extends Controller
{
    public $bid;
    public $fid;


    public function individual( $fid,$bid, Individual $chart){
        $this->bid = $bid;
        $this->fid = $fid;
         
        $months =array();
        $sum = array();
       

        $data = Months::has('catch')->with(['catch'=> function ($query){
            $query->where('barangay_id','=',$this->bid)->where('fish_id','=',$this->fid);
        }])->withSum(['catch' => function ($query){
            $query -> where('fish_id','=',$this->fid);
        }],'kilo')->get();

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
