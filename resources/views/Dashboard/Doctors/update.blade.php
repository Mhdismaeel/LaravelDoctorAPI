@extends('Dashboard.dashboard')
@section('content')
<h3>Update Doctor Information</h3>
<div class="card-body">
    <form name="update-doctor-form" id="update-doctor-form" method="post" action="{{url('UpdateDoctor',$doctor->id)}}">
     @csrf
     <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" id="name" name="name" class="form-control" value="{{$doctor->name}}">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Address</label>
        <input type="text" id="address" name="address" class="form-control" value="{{$doctor->address}}">
      </div>



      <div class="form-group">
        <label for="exampleInputEmail1">Mobile</label>
        <input type="text" id="mobile" name="mobile" class="form-control" value="{{$doctor->mobile}}">
      </div>



      <div class="form-group">
        <label for="exampleInputEmail1">Location</label>
        <input type="text" id="location" name="location" class="form-control" value="{{$doctor->location}}">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Longitude</label>
        <input type="number" id="lon" name="lon" class="form-control" step="0.01" value="{{$doctor->lon}}">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Latitude</label>
        <input type="number" id="lat" name="lat" class="form-control" step="0.01" value="{{$doctor->lat}}">
      </div>


      <div class="form-group">
        <label for="exampleInputEmail1">Type</label>
        <select class="form-select" aria-label="Default select example" name="typeid" id="typeid">
            <option selected value="{{$doctor->typeid}}">{{$doctor->types->name}}</option>
            @foreach ( $types as $t)
            <option value="{{$t->id}}" >{{$t->name}}</option>
            @endforeach
          </select>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="text" id="email" name="email" class="form-control" required="" value="{{$doctor->email}}">
      </div>

      @if ($errors->has('email'))
      <span class="text-danger">{{ $errors->first('email') }}</span>
      @endif
      </div>


      <div class="form-group">
        <label for="exampleInputEmail1">Note</label>
        <textarea name="note" class="form-control" value="{{$doctor->note}}">{{$doctor->note}}</textarea>
      </div>



    <br>
        <button type="submit" class="btn btn-primary">Update</button>


    </form>
  </div>
@endsection
