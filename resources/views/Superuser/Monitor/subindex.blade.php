@extends('layouts.admin')


@section('content')
<admin-container-component role="{{auth()->user()->role}}" authname="{{auth()->user()->name}}" nav="Monitor">
<sub-monitor-component id="{{$id}}"/>
</admin-container-component>
@endsection