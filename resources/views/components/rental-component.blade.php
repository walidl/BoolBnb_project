{{-- @foreach ($rentals as $rental)

  <div class="card col-5 m-2 pt-3" style="width: 18rem;">

    @if ($rental->isSponsored())
      <div class="">
        <i class="fas fa-star"></i>

      </div>
    @endif

    {{$rental->user->name}} {{$rental->user->lastname}}
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
        Bedrooms: {{$rental->beds}}
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
    <div class="card-footer">
      <a href="{{route('payment.sponsor',$rental->id)}}">Sponsor</a>
    </div>
  </div>

@endforeach --}}



{{-- <img src="{{asset('storage/images/'.$rental->image)}}" class="card-img-top">
{{$rental->user->name}} {{$rental->user->lastname}} --}}
@foreach ($rentals as $rental)
  <div class="card rental-card d-flex flex-row m-2" >

  <div class="image col-5" style="background-image: url('{{asset('storage/images/'.$rental->image)}}') ">
  
  </div>
  <div class=" pl-2 pt-2 col-7">
    <h4 class="card-title m-0 mb-1">{{$rental->title}}</h4>
    <div class=" address mb-2">
      {{$rental->address}}
    </div>
    <div class="d-flex">
      <div class="mr-2">
        {{$rental->rooms}} <i class="fas fa-home mr-1"></i>
      </div>
      <div class="mr-2">
        {{$rental->beds}} <i class="fas fa-bed mr-1"></i>
      </div>

    </div>
    <div class="services mt-2 d-flex justify-content-end">

      @foreach ($rental->services as $service)
        <div class="element mx-1 ">

          <i class="{{$service->icon}} mr-2"></i>
        </div>
      @endforeach
    </div>

  </div>
</div>
@endforeach

{{-- <div class="card-footer">
  <a href="{{route('payment.sponsor',$rental->id)}}">Sponsor</a>
</div> --}}
