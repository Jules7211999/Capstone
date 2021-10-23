<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserProfile extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Superuser.user');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Superuser.addUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $model = User::find($id);

        $data = $model->toJson();

        return view("Superuser.userShow") -> with('data', $data);
    
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
        return view('Superuser.editUser')->with('data',$model);
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
            'username' => 'required|',
            'barangay' => 'required'
        ]);

         User::find($id)->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            // 'password' => Hash::make($request->password),
            'password' => $request->password,
            'address'=> $request->address,
            'gender' => $request->gender,
            'date' => $request-> birthdate,
            'username' => $request->username,
            'barangay' => $request->barangay
        ]);

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
