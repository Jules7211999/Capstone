@extends('layouts.admin')


@section('content')
<admin-container-component role="{{auth()->user()->role}}" authname="{{auth()->user()->name}}">
   <admin-trash-component/>
</admin-container-component>
@endsection