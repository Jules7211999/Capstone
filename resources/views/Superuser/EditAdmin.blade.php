@extends('layouts.admin')
@section('content')
<admin-container-component role="{{auth()->user()->role}}" authname="{{auth()->user()->name}}" nav="Edit Barangay Admin">
<a href="/admin">Back</a>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
<form method="POST" action="/admin/{{$data->id}}" class="justify-content-center d-flex">
        @csrf
        @method('PUT')

            <div class="container">
                <div>
                    <div>
                        <label class="font-weight-bold" for="name">Name</label>
                    </div>
                    <div>
                        <input  type="text" id="name" class="form-control-lg w-50 border border-secondary bg-transparent"  value="{{$data->name}}"name="name" required autofocus />
                    </div>
                    @error('name')
                        <div class="pt-2">{{$message}}</div>
                    @enderror
                    <div>
                        <label class="font-weight-bold" for="email">Email</label>
                    </div>
                    <div>
                        <input  type="text" id="email" class="form-control-lg w-50 border border-secondary bg-transparent"  value="{{$data->email}}" name="email" required autofocus />
                    </div>
                    @error('email')
                        <div class="pt-2">{{$message}}</div>
                    @enderror
                    <div>
                        <label class="font-weight-bold" for="password">Password</label>
                    </div>
                    <div>
                        <input type="password" id="password" class="form-control-lg w-50 border border-secondary bg-transparent" name="password" />
                    </div>
                    @error('password')
                        <div class="pt-2">{{$message}}</div>
                    @enderror
                    <div>
                        <label class="font-weight-bold" for="password">Confirm Password</label>
                    </div>
                    <div>
                        <input  type="password" id="password" class="form-control-lg w-50 border border-secondary bg-transparent" name="password_confirmation"/>
                    </div>
                    @error('password_confirmation')
                       <div class="pt-2">{{$message}}</div>
                   @enderror
                   <div>
                       <label class="font-weight-bold" for="address">Address</label>
                    </div>
                    <div>
                        <input id="address" type="text" class="form-control-lg w-50 border border-secondary bg-transparent"  value="{{$data->address}}" name="address" >
                    </div>
                    @error('address')
                        <div class="pt-2">{{$message}}</div>
                    @enderror
                    <div>
                       <label class="font-weight-bold" for="barangay">Barangay</label>
                    </div>
                    <div>
                        <dropdown-barangay-component/>
                    </div>
                    @error('barangay')
                        <div class="pt-2">{{$message}}</div>
                    @enderror
                    <div>
                        <label class="font-weight-bold" for="phone_number">Phone Number</label>
                    </div>
                    <div>
                        <input id="phone_number" type="text" name="phone_number"  value="{{$data->phone_number}}" class="form-control-lg w-50 border border-secondary bg-transparent" >
                    </div>
                    @error('phone_number')
                        <div class="pt-2">{{$message}}</div>
                    @enderror
                    <div>
                        <label class="font-weight-bold" for="birthdate">Birthdate</label>
                    </div>
                    <div>
                        <input id="birthdate" type="date" name="birthdate"  value="{{$data->birthdate}}"class="form-control-lg w-50 border border-secondary bg-transparent" >
                    </div>
                    @error('birthdate')
                        <div class="pt-2">{{$message}}</div>
                    @enderror
                    <div>
                        <label class="font-weight-bold" for="gender">Gender</label>
                    </div>
                    <div>
                        <select class="font-weight-bold form-control-lg w-50 border border-secondary bg-transparent" id="inlineFormCustomSelect"  name="gender">
                         @if($data->gender == "Male")
                            <option class="font-weight-bold" value="Male" selected>Male</option>
                            <option class="font-weight-bold" value="Female">Female</option>
                        @else
                            <option class="font-weight-bold" value="Male">Male</option>
                            <option class="font-weight-bold" value="Female" selected>Female</option>
                        @endif    
                        
                        </select>
                    </div>
                    @error('gender')
                        <div class="pt-2">{{$message}}</div>
                    @enderror
                 </div>
                    <button class="bg-light btn btn-outline-dark font-weight-bold rounded py-1 text-dark px-5" type="submit">Register</button>
            </div>
        </form>
</admin-container-component>
@endsection