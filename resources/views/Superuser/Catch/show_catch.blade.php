@extends('layouts.admin')


@section('content')
<admin-container-component role="{{auth()->user()->role}}" authname="{{auth()->user()->name}}" nav="Fish Catch">
    <catch-show-component :data="{{$data}}" :barangay_id="{{auth()->user()->barangay_id}}"/>
</admin-container-component>
@endsection