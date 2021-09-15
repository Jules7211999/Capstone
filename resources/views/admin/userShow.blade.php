@extends('layouts.admin')


@section('content')
    <user-show-component :data="{{$data}}"/>
@endsection