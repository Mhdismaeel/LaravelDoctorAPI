@extends('Dashboard.dashboard')
@section('content')
<div class="card-body">
    <form name="add-doctor-form" id="add-doctor-form" method="post" action="{{url('StoreDoctor')}}">
     @csrf
     <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" id="name" name="name" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Address</label>
        <input type="text" id="address" name="address" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Mobile</label>
        <input type="text" id="mobile" name="mobile" class="form-control" required>
      </div>



      <div class="form-group">
        <label for="exampleInputEmail1">Location</label>
        <input type="text" id="location" name="location" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Longitude</label>
        <input type="number" id="lon" name="lon" class="form-control" step="0.01" required>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Latitude</label>
        <input type="number" id="lat" name="lat" class="form-control" step="0.01" required>
      </div>


      <div class="form-group">
        <label for="exampleInputEmail1">Type</label>
        <select class="form-select" aria-label="Default select example" name="typeid" id="typeid">
            <option selected>Doctors Type</option>
            @foreach ( $types as $t)
            <option value="{{$t->id}}" >{{$t->name}}</option>
            @endforeach
          </select>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="text" id="email" name="email" class="form-control" required="" placeholder="name@example.com">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Note</label>
        <textarea name="note" class="form-control" required=""></textarea>
      </div>



    <br>
        <button type="submit" class="btn btn-primary">Submit</button>


    </form>
  </div>
@endsection
