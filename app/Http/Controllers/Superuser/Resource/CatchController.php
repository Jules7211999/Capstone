<?php

namespace App\Http\Controllers\Superuser\resource;

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

        FishCatch::create([
            'year' => $year,
            'month' => $date->month,
            'common_name' => $request->common_name,
            'local_name' => $request->local_name,
            'barangay' => auth()->user()->barangay,
            'kilo' => $request->weight,

        ]);
        
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

        return view("Superuser.Catch.ShowCatch") -> with('data', $data);
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
