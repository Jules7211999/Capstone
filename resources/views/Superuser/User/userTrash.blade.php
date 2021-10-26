@extends('layouts.admin')


@section('content')
<admin-container-component role="{{auth()->user()->role}}" authname="{{auth()->user()->name}}">
    <user-trash-component/>
</admin-container-component>
@endsection