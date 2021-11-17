@extends('layouts.admin')


@section('content')
<admin-container-component role="{{auth()->user()->role}}" authname="{{auth()->user()->name}}" nav="LGU">
     <lgu-component/>
</admin-container-component>
@endsection