@extends('Dashboard.dashboard')
@section('content')

@if(count($response))
<a href="/CreateDoctor">
<button class="btn btn-success">New</button></a>
<table class="table">
    <thead>
      <tr>
        <th scope="col" style="text-align: center">Name</th>
        <th scope="col" style="text-align: center">Address</th>
        <th scope="col" style="text-align: center">Mobile</th>
        <th scope="col" style="text-align: center">Email</th>
        <th scope="col" style="text-align: center">Location</th>
        <th scope="col" style="text-align: center">Attendance</th>
        <th scope="col" style="text-align: center">Type</th>
        <th scope="col" style="text-align: center">Edit</th>
        <th scope="col" style="text-align: center">Delete</th>


      </tr>
    </thead>
    <tbody>
      @foreach ($response as  $t)
      <tr>
          <td style="text-align: center">{{$t->name}}</td>
          <td style="text-align: center">{{$t->address}}</td>
          <td style="text-align: center">{{$t->mobile}}</td>
          <td style="text-align: center">{{$t->email}}</td>
          <td style="text-align: center">{{$t->location}}</td>
          <td style="text-align: center">{{$t->note}}</td>
          <td style="text-align: center">{{$t->types->name}}</td>
          <td style="text-align: center"><a type="button" class="btn btn-primary" href="/EditDoctor/{{$t->id}}">Edit</a></td>
          <td style="text-align: center"><a type="button" onclick="return confirm('Are you sure?')" class="btn btn-danger" href="/DeleteDoctor/{{$t->id}}">Delete</a></td>

      </tr>

      @endforeach


    </tbody>
  </table>
  @else
  <div class="alert alert-warning">{{__('No Doctors')}}</div>
@endif
  @endsection
