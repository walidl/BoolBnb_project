
@foreach ($rentals as $rental)
  <div class="card rental-card sponsored d-flex flex-row m-2" >
  <img  class="premium" src="http://www.cliparthut.com/clip-arts/69/vector-floral-corners-vector-download-clipart-fFE7NX.png" alt="">

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
    <div class="services mt-2">

      @foreach ($rental->services as $service)
        <i class="{{$service->icon}} mr-2"></i>
      @endforeach
    </div>

  </div>
</div>
@endforeach

{{-- <div class="card-footer">
  <a href="{{route('payment.sponsor',$rental->id)}}">Sponsor</a>
</div> --}}
