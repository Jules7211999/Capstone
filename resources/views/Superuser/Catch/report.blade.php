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
@endsection