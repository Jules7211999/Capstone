@extends('layouts.admin')


@section('content')
<a href="/user">Back</a>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
<form method="POST" action="/userCreate" class="justify-content-center d-flex">
        @csrf
            <div class="container">
                <div>
                    <div>
                        <label class="font-weight-bold" for="name">Name</label>
                    </div>
                    <div>
                        <input  type="text" id="name" class="form-control-lg w-50 border border-secondary bg-transparent"  name="name" required autofocus />
                    </div>
                    @error('name')
                        <div class="pt-2">{{$message}}</div>
                    @enderror
                    <div>
                        <label class="font-weight-bold" for="name">Username</label>
                    </div>
                    <div>
                        <input  type="text" id="name" class="form-control-lg w-50 border border-secondary bg-transparent"  name="username" required autofocus />
                    </div>
                    @error('username')
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
                        <input id="address" type="text" class="form-control-lg w-50 border border-secondary bg-transparent"  name="address" >
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
                        <input id="phone_number" type="text" name="phone_number" class="form-control-lg w-50 border border-secondary bg-transparent" >
                    </div>
                    @error('phone_number')
                        <div class="pt-2">{{$message}}</div>
                    @enderror
                    <div>
                        <label class="font-weight-bold" for="birthdate">Birthdate</label>
                    </div>
                    <div>
                        <input id="birthdate" type="date" name="birthdate"  class="form-control-lg w-50 border border-secondary bg-transparent" >
                    </div>
                    @error('birthdate')
                        <div class="pt-2">{{$message}}</div>
                    @enderror
                    <div>
                        <label class="font-weight-bold" for="gender">Gender</label>
                    </div>
                    <div>
                        <select class="font-weight-bold form-control-lg w-50 border border-secondary bg-transparent" id="inlineFormCustomSelect" name="gender">
                            <option class="font-weight-bold" value="Male" selected>Male</option>
                            <option class="font-weight-bold" value="Female">Female</option>
                        </select>
                    </div>
                    @error('gender')
                        <div class="pt-2">{{$message}}</div>
                    @enderror
                 </div>
                    <button class="mt-3 p-2 font-weight-bold rounded py-1 text-dark px-5 btn-custom border-0" type="submit">Register</button>
            </div>
        </form>
@endsection