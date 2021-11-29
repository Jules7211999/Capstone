@extends('layouts.report')

@section('content')

<h3 class="font-weight-bold text-dark mb-3 mt-5">Activity Log</h3>
<table class="table">
  <thead class="thead-dark">
    <tr class="font-weight-bold">
      <th scope="col">#</th>
      <th scope="col">User ID</th>
      <th scope="col">Role</th>
      <th scope="col">Activity</th>
      <th scope="col">Day of the Week</th>
      <th scope="col">month_name</th>
      <th scope="col">Date and Time</th>

    </tr>
  </thead>
  <tbody>
  @foreach($months as $h)
  <h1>{{$h->name}}</h1>
  @foreach($h->history as $x)
  <tr class="font-weight-bold">
      <td>{{$x->id}}</td>
      <td>{{$x->user_id}}</td>
      <td>{{$x->user->role}}</td>
      <td>{{$x->activity}}</td>
      <td>{{$x->day_of_week}}</td>
      <td>{{$x->month_name}}</td>
      <td>{{$x->datetimezone}}</td>
    </tr>
    @endforeach
  @endforeach
  
  </tbody>
</table>
<!-- admin table -->
 
@endsection