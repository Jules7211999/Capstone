@extends('layouts.admin')


@section('content')
    <profile-component 
    name="{{auth()->user()->name}}"
    email="{{auth()->user()->email}}"
    birthdate="{{auth()->user()->birthdate}}"
    gender="{{auth()->user()->gender}}"
    />
@endsection