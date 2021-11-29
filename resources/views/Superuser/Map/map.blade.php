@extends('layouts.admin')


@section('content')
<admin-container-component role="{{auth()->user()->role}}" authname="{{auth()->user()->name}}" nav="Map">
<mapbox-component barangay_id="{{auth()->user()->barangay_id}}"/>
</admin-container-component>
@endsection