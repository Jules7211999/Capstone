<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Models\fish;
use App\Models\FishCatch;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        history("Visited Monitor Page");
        return view('Superuser.Catch.catch');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
  

        $date = Carbon::now();
        $year = $date-> format('Y');
        $month = $date->format('m');

       
        $request->validate([
            'weight' => 'required|numeric'
        ]);

        FishCatch::create([
            'year' => $year,
            'month_id' => $month,
            'fish_id' => 1,
            'barangay_id' => auth()->user()->barangay_id,
            'kilos' => $request->weight,

        ]);

        return "Success";
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = fish::find($id);

        $data = $model->toJson();

        return view("Superuser.Catch.show_catch") -> with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
