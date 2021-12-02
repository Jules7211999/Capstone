@extends('layouts.report')

@section('content')

<h3 class="font-weight-bold text-dark  mt-5">Activity Log</h3>
<table class="table">
  <thead class="thead-dark">
    <tr class="font-weight-bold">
      <th scope="col">#</th>
      <th scope="col">User ID</th>
      <th scope="col">Name</th>
      <th scope="col">Role</th>
      <th scope="col">Activity</th>
      <th scope="col">Day of the Week</th>
      <th scope="col">month_name</th>
      <th scope="col">Date and Time</th>
    </tr>
  </thead>
  <tbody>
  @foreach($months as $m)
@foreach($m->history as $h)
<tr class="font-weight-bold">
  <td>{{$h->id}}</td>
  <td>{{$h->user->id}}</td>
  <td>{{$h->user->name}}</td>
  <td>{{$h->user->role}}</td>
  <td>{{$h->activity}}</td>
  <td>{{$h->day_of_week}}</td>
  <td>{{$h->month_name}}</td>
  <td>{{$h->datetimezone}}</td>
</tr>
@endforeach
@endforeach
  
  </tbody>
</table>
<!-- admin table -->
 
@endsection



