@extends('layouts.admin')


@section('content')
<admin-container-component role="{{auth()->user()->role}}" authname="{{auth()->user()->name}}" nav="SOS">
    <admin-sos-component barangay="{{auth()->user()->barangay_id}}" role="{{auth()->user()->role}}"/>
</admin-container-component>
@endsection