@extends('layouts.admin')


@section('content')
<admin-container-component role="{{auth()->user()->role}}" authname="{{auth()->user()->name}}" nav="Barangay Admin">
    <admin-component/>  
</admin-container-component>
@endsection