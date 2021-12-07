<?php

namespace App\Http\Controllers\Resource;

use App\Models\User;
use App\Models\barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\city;
use Illuminate\Support\Facades\Storage;

class UserProfile extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        history("Visited Fisherman Page");

        return view('Superuser.User.user');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        history("Visited Add Fisherman Page");

        return view('Superuser.User.add_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|max:255',
            'phone_number' => 'required|numeric',
            'city' => 'required',
            'gender' => 'required',
            'birthdate' => 'required',
            'password' => 'required|confirmed|min:8',
            'username' => 'required|unique:App\Models\User,username',
            'barangay' => 'required',
            'marital_status' => 'required',
            'image' => 'required'
        ]);

        $file = $request->file('image');
        $name = time().$file->getClientOriginalName();
        $ran = rand();
         User::create([
             'id'=> $ran,
            'name' => $request->name,
            'birthdate' => $request->birthdate,
            'phone' => $request->phone_number,
            'password' => $request->password,
            'address'=> $request->address,
            'gender' => $request->gender,
            'date' => $request-> birthdate,
            'username' => $request->username,
            'barangay_id' => $request->barangay,
            'city_id' => $request->city,
            'phone_number' => $request->phone_number,
            'profile_image' => $name,
            'role' => "User",
            'marital_status' => $request->marital_status
        ]);

            $filepath = $name;
            Storage::disk('s3')->put($filepath,file_get_contents($file));

            history("Added Fisherman"." ".$request->name. " ". $ran);
        return redirect()->back()->with('message','User Registered');

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {
       

        $model = User::where('id','=',$id)->with(['city','barangay'])->get();

        $data = $model->toJson();

        history("Added Fisherman"." ".$model[0]->name);

        return view("Superuser.User.user_show") -> with('data', $data);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $model= User::find($id);
        $barangay = barang::all();
        $municipality = city::all();
      
        history("Trying to Edit the Profile of ". " ". $model->name);

        return view('Superuser.User.edit_user',['data'=> $model,'barangay' => $barangay,'municipality' => $municipality]);
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

        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|max:255',
            'phone_number' => 'required|numeric',
            'gender' => 'required',
            'birthdate' => 'required',
            'password' => 'required|confirmed|min:8',
            'username' => 'required',
            'city' => 'required',
            'barangay' => 'required',
            'marital_status' => 'required'
        ]);

        
        if($request->file('image') == null){
            User::find($id)->update([
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'password' => $request->password,
                'address'=> $request->address,
                'gender' => $request->gender,
                'date' => $request-> birthdate,
                'username' => $request->username,
                'barangay_id' => $request->barangay,
                'marital_status' => $request->marital_status,
                'city_id' => $request->city,
            ]);
        }else{
            $file = $request->file('image');
            $name = time().$file->getClientOriginalName();
       
             User::find($id)->update([
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'password' => $request->password,
                'address'=> $request->address,
                'gender' => $request->gender,
                'date' => $request-> birthdate,
                'username' => $request->username,
                'barangay_id' => $request->barangay,
                'marital_status' => $request->marital_status,
                'city_id' => $request->city,
                    'profile_image' => $name
           ]);

            $filepath = $name;
            Storage::disk('s3')->put($filepath,file_get_contents($file));
        }

        history("Updated the Profile of ". " ". $request->name);
        
        return redirect()->back()->with('message','User Updated');
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
