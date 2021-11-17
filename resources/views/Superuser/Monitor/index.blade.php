@extends('layouts.admin')


@section('content')
<admin-container-component role="{{auth()->user()->role}}" authname="{{auth()->user()->name}}" nav="Monitor">
<monitor-component/>
</admin-container-component>
@endsection