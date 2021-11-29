@extends('layouts.report')

@section('content')
<h3 class="font-weight-bold text-dark mb-3 mt-5">Admin</h3>
<table class="table">
  <thead class="thead-dark">
    <tr class="font-weight-bold">
      <th scope="col">id</th>
      <th scope="col">Email</th>
      <th scope="col">Phone Numer</th>
      <th scope="col">Address</th>
      <th scope="col">City</th>
      <th scope="col">Barangay</th>
      <th scope="col">Gender</th>
      <th scope="col">Marital Status</th>
    </tr>
  </thead>
  <tbody>
    
   @foreach($admin as $a)
   <tr class="font-weight-bold">
      <td>{{$a->id}}</td>
      <td>{{$a->email}}</td>
      <td>{{$a->phone_number}}</td>
      <td>{{$a->address}}</td>
      <td>{{$a->city->name}}</td>
      <td>{{$a->barangay->name}}</td>
      <td>{{$a->gender}}</td>
      <td>{{$a->marital_status}}</td>
    </tr>
   @endforeach
  </tbody>
</table>
<!-- admin table -->
<h3 class="font-weight-bold text-dark mb-3 mt-5">Fisherman</h3>
<table class="table">
  <thead class="thead-dark">
    <tr class="font-weight-bold">
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Username</th>
      <th scope="col">Address</th>
      <th scope="col">City</th>
      <th scope="col">Barangay</th>
      <th scope="col">Gender</th>
      <th scope="col">Marital Status</th>
    </tr>
  </thead>
  <tbody>
   @foreach($fisherman as $f)
   <tr class="font-weight-bold">
      <td>{{$f->id}}</td>
      <td>{{$f->username}}</td>
      <td>{{$f->phone_number}}</td>
      <td>{{$f->address}}</td>
      <td>{{$f->city->name}}</td>
      <td>{{$f->barangay->name}}</td>
      <td>{{$f->gender}}</td>
      <td>{{$f->marital_status}}</td>
    </tr>
   @endforeach
  </tbody>
</table>
<!-- fisherman table -->
<h3 class="font-weight-bold text-dark mb-3 mt-5">SOS</h3>
<table class="table">
  <thead class="thead-dark">
    <tr class="font-weight-bold">
      <th scope="col">id</th>
      <th scope="col">Fisherman ID</th>
      <th scope="col">Fisherman</th>
      <th scope="col">Longitude</th>
      <th scope="col">Latitude</th>
      <th scope="col">Status</th>
      <th scope="col">Date and Time</th>
    </tr>
  </thead>
  <tbody>
    
   @foreach($sos as $s)
   <tr class="font-weight-bold">
      <td>{{$s->id}}</td>
      <td>{{$s->user->id}}</td>
      <td>{{$s->user->name}}</td>
      <td>{{$s->Latitude}}</td>
      <td>{{$s->Longitude}}</td>
      <td>{{$s->status}}</td>
      <td>{{$s->datetimezone}}</td>
    </tr>
   @endforeach
  </tbody>
</table>
<!-- sos table -->
<h3 class="font-weight-bold text-dark mb-3 mt-5">LGU - City / Municipality</h3>
<table class="table">
<thead class="thead-dark">
    <tr class="font-weight-bold">
    <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">zipcode</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    @foreach($city as $c)
      <tr class="font-weight-bold">
        <td>{{$c->id}}</td>
        <td>{{$c->name}}</td>
        <td>{{$c->zipcode}}</td>
        <td>{{$c->status}}</td>
      </tr>
    @endforeach
  </tbody>
</table>
<!-- city Municipality table -->
<h3 class="font-weight-bold text-dark mb-3 mt-5">LGU - Barangay</h3>
<table class="table">
<thead class="thead-dark">
    <tr class="font-weight-bold">
    <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">City</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    @foreach($barangay as $b)
      <tr class="font-weight-bold">
        <td>{{$b->id}}</td>
        <td>{{$b->name}}</td>
        <td>{{$b->city->name}}</td>
        <td>{{$b->status}}</td>
      </tr>
    @endforeach
  </tbody>
</table>
<!-- barangay table -->
<h3 class="font-weight-bold text-dark mb-3 mt-5">Location Received</h3>
<table class="table">
<thead class="thead-dark">
    <tr class="font-weight-bold">
    <th scope="col">ID</th>
      <th scope="col">Fisherman ID</th>
      <th scope="col">Fisherman</th>
      <th scope="col">Latitude</th>
      <th scope="col">Longitude</th>
      <th scope="col">Date and Time</th>
    </tr>
  </thead>
  <tbody>
    @foreach($coord as $co)
      <tr class="font-weight-bold">
        <td>{{$co->id}}</td>
        <td>{{$co->user->id}}</td>
        <td>{{$co->user->name}}</td>
        <td>{{$co->latitude}}</td>
        <td>{{$co->longitude}}</td>
        <td>{{$co->datetimezone}}</td>
      </tr>
    @endforeach
  </tbody>
</table>
<!-- coordinates table -->
<h3 class="font-weight-bold text-dark mb-3 mt-5">Fish Species</h3>
<table class="table">
<thead class="thead-dark">
    <tr class="font-weight-bold">
      <th scope="col">ID</th>
      <th scope="col">Phylum</th>
      <th scope="col">Subphylum</th>
      <th scope="col">Superclass</th>
      <th scope="col">Class</th>
      <th scope="col">Common Name</th>
      <th scope="col">Local Name</th>
    </tr>
  </thead>
  <tbody>
    @foreach($fish as $f)
      <tr class="font-weight-bold">
        <td>{{$f->id}}</td>
        <td>{{$f->phylum}}</td>
        <td>{{$f->subphylum}}</td>
        <td>{{$f->superclass}}</td>
        <td>{{$f->class}}</td>
        <td>{{$f->common_name}}</td>
        <td>{{$f->local_name}}</td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection