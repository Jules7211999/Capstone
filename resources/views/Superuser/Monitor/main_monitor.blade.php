@extends('layouts.report')

@section('content')
<div class="container px-4 mx-auto">
     <div class="p-6 m-20 bg-white">
    {{$fish->common_name}}
     </div>

    <div class="p-6 m-20 bg-white ">
        {!! $chart->container() !!}
    </div>

</div>

<script src="{{ $chart->cdn() }}"></script>

{{ $chart->script() }}
@endsection