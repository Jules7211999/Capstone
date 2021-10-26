@extends('layouts.admin')
@section('content')
<admin-container-component role="{{auth()->user()->role}}" authname="{{auth()->user()->name}}" nav="Add Barangay Admin">
<a href="/admin">Back</a>
    @if(session()->has('message'))
        <div class="row w-100 font-weight-bold d-flex justify-content-center p-5 text-success">
            {{ session()->get('message') }}
        </div>
    @endif
<form method="POST" action="/barangay" class="justify-content-center d-flex">
        @csrf
            <div class="container w-100">
                   <div class="row">
                        <div class="col">
                            <div>
                                <label for="baranagay_name">Barangay Name</label>
                            </div>
                            <div>
                                <input type="text">
                            </div>
                        </div>
                   </div>
            </div>
        </form>
</admin-container-component>
@endsection