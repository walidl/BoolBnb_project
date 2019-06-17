@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-8 ml-col-2">

          <form class="" action="{{route('rental.store')}}" method="post" enctype="multipart/form-data">

            @csrf


            <div class="form-group" >
              <label for="title">Title</label>
              <input type="text" class="form-control {{$errors->has('title') ? "border-danger" : "" }}" name = "title" placeholder="Enter Title">
              {!! $errors->first('title', '<small class="form-text text-danger">:message</small>') !!}
            </div>

            <div class="form-group">
              <label for="rooms">Rooms</label>
              <input type="number"  min="1" max="10" class="form-control {{$errors->has('rooms') ? "border-danger" : "" }}" name = "rooms">
                {!! $errors->first('rooms', '<small class="form-text text-danger">:message</small>') !!}
            </div>
            <div class="form-group">
              <label for="bedrooms">Bedrooms</label>
              <input type="number"  min="1" max="10" class="form-control {{$errors->has('bedrooms') ? "border-danger" : "" }}" name = "bedrooms">
                {!! $errors->first('bedrooms', '<small class="form-text text-danger">:message</small>') !!}
            </div>
            <div class="form-group">
              <label for="bathrooms">Bathrooms</label>
              <input type="number"  min="1" max="10" class="form-control {{$errors->has('bathrooms') ? "border-danger" : "" }}" name = "bathrooms">
                {!! $errors->first('bathrooms', '<small class="form-text text-danger">:message</small>') !!}
            </div>
            <div class="form-group">
              <label for="square_meters">Surface (m<sup>2</sup>)</label>
              <input type="number"  step="0.01" class="form-control {{$errors->has('square_meters') ? "border-danger" : "" }}" name = "square_meters">
                {!! $errors->first('square_meters', '<small class="form-text text-danger">:message</small>') !!}
            </div>

            <div class="form-group" >
              <label for="address">Address</label>
              <input type="text" class="form-control {{$errors->has('address') ? "border-danger" : "" }}" name = "address" placeholder="Enter Address">
              {!! $errors->first('address', '<small class="form-text text-danger">:message</small>') !!}
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" >Upload</span>
              </div>
              <div class="custom-file">
                <input type="file" class="custom-file-input"  aria-describedby="image" name="image">
                <label class="custom-file-label" for="image">Choose file</label>
              </div>
              {!! $errors->first('image', '<small class="form-text text-danger">:message</small>') !!}

            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

        </div>

    </div>
  </div>
@stop