
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
