@extends('layouts.report')

@section('content')
<div class="container w-100 h-100">
     <div class="row w-100 h-50">
        <div class="col-12">
        <img :src="'https://capstone-salvador-bucket.s3.us-east-2.amazonaws.com/'.{{$fish->image}}" alt="" class="w-100">
        </div>
     </div>

    
        {!! $chart->container() !!}
    

</div>

<script src="{{ $chart->cdn() }}"></script>

{{ $chart->script() }}
@endsection