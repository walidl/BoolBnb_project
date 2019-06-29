@extends('layouts.app')

@section('content')

  <section  id="user-rentals" class=" py-5">

    <div class="container">
      <div class="row">
        @foreach ($rentals as $rental)

          <div class="card m-2 p-0" style="width: 18rem;">
            <div class="card-header d-flex justify-content-between">
              @if (!$rental->isSponsored())

                <a href="{{route('payment.sponsor',$rental->id)}}">Sponsor</a>
              @else

                <div class="sponsor-stamp">
                  SPONSORED
                </div>

              @endif
              <a href="{{route('edit.rental',$rental->id)}}">Edit</a>
            </div>


            <div class="card-body">
              <h5 class="card-title">{{$rental->title}}</h5>
              <hr>
              <div class="">
                <b>Address:</b> {{$rental->address}}
              </div>
              <div class="">
                <b>Rooms:</b> {{$rental->rooms}}
              </div>
              <div class="">
                <b>Bathrooms:</b> {{$rental->bathrooms}}
              </div>
              <div class="">
                <b>Beds:</b> {{$rental->beds}}
              </div>
              <div class="">
                <b>Surface:</b> {{$rental->square_meters}} m<sup>2</sup>
              </div>
              <b>Services:</b>
              <div class="">


                @foreach ($rental->services as $service)
                  <i class="{{$service->icon}} mx-2"></i>
                @endforeach
              </div>
                <hr>
              <div class="">
                <b>Description:</b> <br>{{$rental->description}}
              </div>
              <hr>
              <b>Image</b>
              <div class="images">

                <div class="image">
                  <img src="{{asset('storage/images/'.$rental->image)}}" alt="">
                </div>
              </div>
            </div>

          </div>

        @endforeach

      </div>
    </div>
  </section>

@stop
