@extends('layouts.admin')

@section('content')
<admin-container-component role="{{auth()->user()->role}}" authname="{{auth()->user()->name}}" nav="SOS">
    <sos-show-component :data="{{$data }}"/>
</admin-container-component>
@endsection