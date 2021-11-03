@extends('layouts.admin')


@section('content')
<admin-container-component role="{{auth()->user()->role}}" authname="{{auth()->user()->name}}" nav="Fisherman">
    <user-component role="{{auth()->user()->role}}"/>
</admin-container-component>
@endsection