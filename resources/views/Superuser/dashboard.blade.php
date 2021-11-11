@extends('layouts.admin')


@section('content')
<admin-container-component role="{{auth()->user()->role}}" authname="{{auth()->user()->name}}" nav="Dashboard">
  <dashboard-component user="{{$user}}"  coord="{{$coord}}" sos="{{$sos}}" admin="{{$admin}}" fish="{{$fish}}" barangay="{{$barangay}}" city ="{{$city}}" fisherman="{{$fisherman}}" sosr="{{$sosr}}"/>
</admin-container-component>
@endsection