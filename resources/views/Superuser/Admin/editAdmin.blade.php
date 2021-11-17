@extends('layouts.admin')
@section('content')
<admin-container-component role="{{auth()->user()->role}}" authname="{{auth()->user()->name}}" nav="Update Barangay Admin">
<a href="/admin">Back</a>
@if(session()->has('message'))
        <div class="row w-100 font-weight-bold d-flex justify-content-center p-5 text-success">
            {{ session()->get('message') }}
        </div>
    @endif
<form method="POST" action="/admin/{{$data->id}}" class="justify-content-center d-flex" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container w-100">
        <div class="w-100 mb-5 ">
                        <profile-image-component/>
                    </div>
                    @error('image')
                        <div class="pt-2 text-danger font-weight-bold mt-2 mb-2 row w-100 d-flex justify-content-center">{{$message}}</div>
                    @enderror 
                    <div class="row">
                        <div class="col">
                            <div >
                                <label class="font-weight-bold mb-3 mt-2" for="name">Name</label>
                            </div>
                            <div>
                                <input  type="text" id="name" class="form-control-lg w-100 border font-weight-bold bg-transparent"  value="{{$data->name}}" name="name" required autofocus />
                            </div>
                                @error('name')
                                    <div class="pt-2 text-danger font-weight-bold mt-2 mb-2">{{$message}}</div>
                                @enderror
                        </div>
                        <div class="col">
                            <div>
                                <label class="font-weight-bold mb-3 mt-2" for="email">Email</label>
                            </div>
                            <div>
                                <input  type="text" id="email" class="form-control-lg w-100 border font-weight-bold bg-transparent"  value="{{$data->email}}" name="email" required autofocus />
                            </div>
                                @error('email')
                                    <div class="pt-2 text-danger font-weight-bold mt-2 mb-2">{{$message}}</div>
                                @enderror
                        </div>
                    </div>
                   <div class="row">
                        <div class="col">
                            <div>
                                <label class="font-weight-bold mb-3 mt-2" for="password">Password</label>
                            </div>
                            <div>
                                <input type="password" id="password"  class="form-control-lg w-100 border  bg-transparent" name="password" />
                            </div>
                            @error('password')
                                <div class="pt-2 text-danger font-weight-bold mt-2 mb-2">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <div>
                                <label class="font-weight-bold mb-3 mt-2" for="password">Confirm Password</label>
                            </div>
                            <div>
                                <input  type="password"  id="password" class="form-control-lg w-100 border  bg-transparent" name="password_confirmation"/>
                            </div>
                            @error('password_confirmation')
                               <div class="pt-2 text-danger font-weight-bold mt-2 mb-2">{{$message}}</div>
                            @enderror
                        </div>
                   </div>
                   <div class="row">
                       <div class="col">
                           <div class>
                               <label class="font-weight-bold mb-3 mt-2" for="address">Address</label>
                            </div>
                            <div>
                                <input id="address" type="text" class="form-control-lg w-100 border font-weight-bold bg-transparent"  value="{{$data->address}}" name="address" >
                            </div>
                            @error('address')
                                <div class="pt-2 text-danger font-weight-bold mt-2 mb-2">{{$message}}</div>
                            @enderror
                       </div>
                   </div>
                   <div class="row">
                        <div class="col">
                            <div>
                                <label class="font-weight-bold mb-3 mt-2" for="city">City</label>
                            </div>
                            <div>
                                <select class="form-control-lg w-100 border font-weight-bold bg-transparent" name="city">
                                    <option class="font-weight-bold" value="{{$data->city->id}}">{{$data->city->name}}</option>
                                    @foreach($municipality as $m)
                                        <option class="font-weight-bold" value="{{$m->name}}">{{$m->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div>
                                <label class="font-weight-bold mb-3 mt-2" for="barangay">Barangay</label>
                            </div>
                            <div>
                                <select class="form-control-lg w-100 border font-weight-bold bg-transparent" name="barangay">
                                    <option class="font-weight-bold" value="{{$data->barangay->id}}">{{$data->barangay->name}}</option>
                                    @foreach($barangay as $b)
                                        <option class="font-weight-bold" value="{{$b->name}}">{{$b->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div>
                                <label class="font-weight-bold mb-3 mt-2" for="birthdate">Birthdate</label>
                            </div>
                            <div>
                                <input id="birthdate" type="date" name="birthdate" class="form-control-lg w-100 border font-weight-bold bg-transparent" value="{{$data->birthdate}}">
                            </div>
                            @error('birthdate')
                                <div class="pt-2 text-danger font-weight-bold mt-2 mb-2">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <div>
                                <label class="font-weight-bold mb-3 mt-2" for="gender">Gender</label>
                            </div>
                            <div>
                                <select class="font-weight-bold form-control-lg w-100 border  bg-transparent" id="inlineFormCustomSelect" name="gender" value="{{$data->gender}}">
                                    <option class="font-weight-bold" value="Male" selected>Male</option>
                                    <option class="font-weight-bold" value="Female">Female</option>
                                </select>
                            </div>
                            @error('gender')
                                <div class="pt-2 text-danger font-weight-bold mt-2 mb-2">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div>
                                <label class="font-weight-bold mb-3 mt-2" for="phone_number">Phone Number</label>
                            </div>
                            <div>
                                <input id="phone_number" type="text" name="phone_number" class="form-control-lg w-100 border font-weight-bold bg-transparent" value="{{$data->phone_number}}">
                            </div>
                            @error('phone_number')
                                <div class="pt-2 text-danger font-weight-bold mt-2 mb-2">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <div>
                                <label class="font-weight-bold mb-3 mt-2" for="phone_number">Marital Status</label>
                            </div>
                            <div>
                                <select name="marital_status" class="form-control-lg w-100 border bg-transparent font-weight-bold" value="{{$data->marital_status}}">
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Divorced">Divorced</option>
                                    <option value="Widowed">Widowed</option>
                                    <option value="Seperated">Seperated</option>
                                </select>
                            </div>
                            @error('marital_status')
                                <div class="pt-2 text-danger font-weight-bold mt-2 mb-2">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <button class=" m-5 py-2  btn btn-outline-primary font-weight-bold rounded py-1 text-dark px-5 w-50" type="submit">Update</button>
                    </div>
            </div>
        </form>
</admin-container-component>
@endsection