@extends('layouts.report')

@section('content')
<div class="p-2 mb-5 bh-white row w-100 d-flex justify-content-center">
<img src="https://capstone-salvador-bucket.s3.us-east-2.amazonaws.com/{{$fish->image}}" alt="" class="w-50">
</div>
<div class="p-1 mb-2 bh-white row w-100">
<div class="col d-flex justify-content-center font-weight-bold"><span>Phylum</span></div>
<div class="col d-flex justify-content-center font-weight-bold"><span>Subphylum</span></div>
</div>
<div class="p-1 mb-5 bh-white row w-100">
<div class="col d-flex justify-content-center font-weight-bold text-secondary">{{$fish->phylum}}</div>
<div class="col d-flex justify-content-center font-weight-bold text-secondary">{{$fish->subphylum}}</div>
</div>
<div class="p-1 mb-2 bh-white row w-100">
<div class="col d-flex justify-content-center font-weight-bold">Superclass</div>
<div class="col d-flex justify-content-center font-weight-bold">Class</div>
</div>
<div class="p-1 mb-5 bh-white row w-100">
<div class="col d-flex justify-content-center font-weight-bold text-secondary">{{$fish->superclass}}</div>
<div class="col d-flex justify-content-center font-weight-bold text-secondary">{{$fish->class}}</div>
</div>
<div class="p-1 mb-2 bh-white row w-100">
<div class="col d-flex justify-content-center font-weight-bold">Common Name</div>
<div class="col d-flex justify-content-center font-weight-bold">Local Name</div>
</div>

<div class="p-1 mb-5 bh-white row w-100">
<div class="col d-flex justify-content-center font-weight-bold text-secondary">{{$fish->common_name}}</div>
<div class="col d-flex justify-content-center font-weight-bold text-secondary">{{$fish->local_name}}</div>
</div>


<div class="p-5 m-5 bg-white containter">
    {!! $chart->container() !!}
</div>

<script src="{{ $chart->cdn() }}"></script>

{{ $chart->script() }}

@endsection