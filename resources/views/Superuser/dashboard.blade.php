@extends('layouts.admin')


@section('content')
<admin-container-component role="{{auth()->user()->role}}" authname="{{auth()->user()->name}}" nav="Dashboards">
  <dashboard-component user="{{$user}}" email="{{$email}}" coord="{{$coord}}" sos="{{$sos}}"/>
</admin-container-component>
@endsection