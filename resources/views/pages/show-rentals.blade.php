@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      @foreach ($rentals as $rental)

        <div class="card col-5 m-2 pt-3" style="width: 18rem;">
          {{$rental->user->name}}
          <img src="{{asset('storage/images/'.$rental->image)}}" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">{{$rental->title}}</h5>
            <div class="">
              Address: {{$rental->address}}
            </div>
            <div class="">
              Rooms: {{$rental->rooms}}
            </div>
            <div class="">
              Bathrooms: {{$rental->bathrooms}}
            </div>
            <div class="">
              Bedrooms: {{$rental->bedrooms}}
            </div>
            <div class="">
              Surface: {{$rental->square_meters}} m<sup>2</sup>
            </div>

            <div class="">


              @foreach ($rental->services as $service)
                <i class="{{$service->icon}} mx-2"></i>



              @endforeach
            </div>
          </div>
        </div>

      @endforeach

    </div>
  </div>
@stop
