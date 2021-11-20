@extends('layouts.admin')


@section('content')
<admin-container-component role="{{auth()->user()->role}}" authname="{{auth()->user()->name}}" nav="Dashboard">
  <dashboard-component user= {{$user}} fisherman = {{$fisherman}} admin = {{$admin}} sos = {{$sos}} sosd = {{$sosd}} sosp = {{$sosp}} coord = {{$coord}} barangay = {{$barangay}} city={{$city}}/>
</admin-container-component>
@endsection