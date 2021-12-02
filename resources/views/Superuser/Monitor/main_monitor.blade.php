@extends('layouts.report')

@section('content')
<div class="mb-5 bh-white">
<h1>hello</h1>
</div>
<div class="p-6 m-5 bg-white ">
    {!! $chart->container() !!}
</div>

<script src="{{ $chart->cdn() }}"></script>

{{ $chart->script() }}

@endsection