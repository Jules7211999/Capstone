@extends('layouts.admin')


@section('content')
<admin-container-component role="{{auth()->user()->role}}" authname="{{auth()->user()->name}}">
    <profile-component 
    name="{{auth()->user()->name}}"
    email="{{auth()->user()->email}}"
    birthdate="{{auth()->user()->birthdate}}"
    gender="{{auth()->user()->gender}}"
    />
</admin-container-component>
@endsection