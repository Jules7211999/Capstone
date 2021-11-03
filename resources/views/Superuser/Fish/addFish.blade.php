@extends('layouts.admin')
@section('content')
<admin-container-component role="{{auth()->user()->role}}" authname="{{auth()->user()->name}}" nav="Add Fish">
<a href="/admin">Back</a>
    @if(session()->has('message'))
            <div class="row w-100 font-weight-bold d-flex justify-content-center p-5 text-success">
                {{ session()->get('message') }}
            </div>
    @endif
    <form action="/fish" method="POST" enctype="multipart/form-data">
       @csrf
        <div class="container">
        <div class="row w-100 justify-content-center">
                    <fish-image-component/>
                        @error('image')
                            <div class="pt-2 text-danger font-weight-bold mb-2 mt-2">{{$message}}</div>
                        @enderror
        </div>
            <div class="row">
                <div class="col">
                    <div>
                        <label class="font-weight-bold mb-3 mt-2" for="">Phylum</label>
                    </div>
                    <div>
                        <input  type="text" class="form-control-lg w-100 border bg-transparent"  name="phylum" >
                    </div>
                    @error('phylum')
                        <div class="pt-2 text-danger font-weight-bold mt-2 mb-2">{{$message}}</div>
                    @enderror
                </div>
                <div class="col">
                    <div>
                        <label class="font-weight-bold mb-3 mt-2" for="">Subphylum</label>
                    </div>
                    <div>
                        <input  type="text" class="form-control-lg w-100 border bg-transparent"  name="subphylum" >
                    </div>
                    @error('subphylum')
                        <div class="pt-2 text-danger font-weight-bold mt-2 mb-2">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div>
                        <label class="font-weight-bold mb-3 mt-2" for="">SuperClass</label>
                    </div>
                    <div>
                        <input  type="text" class="form-control-lg w-100 border bg-transparent"  name="superclass" >
                    </div>
                    @error('superclass')
                        <div class="pt-2 text-danger font-weight-bold mt-2 mb-2">{{$message}}</div>
                    @enderror
                </div>
                <div class="col">
                    <div>
                        <label class="font-weight-bold mb-3 mt-2" for="">Class</label>
                    </div>
                    <div>
                        <input  type="text" class="form-control-lg w-100 border bg-transparent"  name="class" >
                    </div>
                    @error('class')
                        <div class="pt-2 text-danger font-weight-bold mt-2 mb-2">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div>
                        <label class="font-weight-bold mb-3 mt-2" for="">Common Name</label>
                    </div>
                    <div>
                        <input  type="text" class="form-control-lg w-100 border bg-transparent"  name="common_name" >
                    </div>
                    @error('common_name')
                        <div class="pt-2 text-danger font-weight-bold mt-2 mb-2">{{$message}}</div>
                    @enderror
                </div>
                <div class="col">
                    <div>
                        <label class="font-weight-bold mb-3 mt-2" for="">Local Name</label>
                    </div>
                    <div>
                        <input  type="text" class="form-control-lg w-100 border bg-transparent"  name="local_name" >
                    </div>
                    @error('local_name')
                        <div class="pt-2 text-danger font-weight-bold mt-2 mb-2">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="row justify-content-center">
                <button class=" m-5 py-2  btn btn-primary font-weight-bold rounded py-1 text-dark px-5 w-50" type="submit">Add Fish</button>
            </div>
        </div>
        

           
    </form>
</admin-container-component>
@endsection