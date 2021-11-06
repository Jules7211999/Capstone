@extends('layouts.admin')


@section('content')
<admin-container-component role="{{auth()->user()->role}}" authname="{{auth()->user()->name}}" nav="LGU">
     <lgu-component>
     <form action="/city" method="POST">
          @csrf
                        <div class="col-7">
                            <input  type="text"  name="nameM" class="form-control-lg w-100 border bg-transparent"  name="name" placeholder="Name" autofocus />
                        </div>
                        <div class="col-4">
                            <input  type="text"  name="postal" class="form-control-lg w-100 border bg-transparent"  name="postal" placeholder="Postal Code"/>
                        </div>
                        <div class="col-1">
                            <input type="submit" value="Add" class="btn font-weight-bold btn-outline-primary pl-5 pr-5">
                        </div>
                          </form>
     </lgu-component>
</admin-container-component>
@endsection