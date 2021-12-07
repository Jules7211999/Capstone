<?php

namespace App\Http\Controllers\Resource;

use App\Models\fish;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FishSpeciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        history("Visited Fish Page");
        return view('Superuser.Fish.fish');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        history("Visited Create Fish page");
        return view('Superuser.Fish.add_fish');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ran = rand();
        $request->validate([
            'id' => $ran,
            'image' => 'required',
            'phylum' => 'required',
            'subphylum' => 'required',
            'class' => 'required',
            'common_name' => 'required',
            'local_name' => 'required',
            'superclass' => 'required',
        ]);

        $file = $request->file('image');
        $name = time().$file->getClientOriginalName();

        fish::create([
            'id', rand(),
            'phylum' => $request->phylum,
            'subphylum' => $request->subphylum,
            'superclass' => $request->superclass,
            'class' => $request->class,
            'common_name' => $request->common_name,
            'local_name'=>$request->local_name,
            'image' => $name
        ]);

    
        $filepath = $name;
        Storage::disk('s3')->put($filepath,file_get_contents($file));

        history("Added the Fish ". $request->common_name);
        return back()->with('message','Fish added');
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

        history("Viewed the Fish ". $model->common_name);
        return view("Superuser.Fish.fish_show") -> with('data', $data);
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
