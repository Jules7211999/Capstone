@extends('layouts.admin')

@section('content')
<admin-container-component role="{{auth()->user()->role}}" authname="{{auth()->user()->name}}" nav="Fish">
  <fish-component/>
</admin-container-component>
@endsection