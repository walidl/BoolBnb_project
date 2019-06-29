@extends('layouts.app')

@section('content')

  <section class=" pb-5" id="rental-page">

    <div class="image ">

      <div class="img__front">
        <div class="back" style="background-image: url('{{asset('storage/images/'.$rental->image)}}')">

        </div>

      </div>

      <div class="img__back">
        <img src="https://source.unsplash.com/collection/1862377/400x300" alt="small__img " class="small__img img-fluid">
        <img src="https://source.unsplash.com/collection/3832136/400x300" alt="small__img " class="small__img img-fluid">
        <img src="https://source.unsplash.com/collection/3759609/400x300" alt="small__img " class="small__img img-fluid">
        <img src="https://source.unsplash.com/collection/1862377/400x300" alt="small__img " class="small__img img-fluid">
      </div>


    </div>
    <div class="container page__content">
      <div class="row">
        <div class="page__content__left">

          <div class="text__title">
            <span id="address">{{$rental->address}}</span>
            <h1>{{$rental->title}}</h1>
            <div class="information">
              <span>{{$rental->square_meters}}m<sup>2</sup> </span>
              <span>{{$rental->beds}} letti</span>
              <span>{{$rental->bathrooms}} bagni</span>
            </div>
          </div>
          <div class="text__description">
            <div class="">
              <p class="col-sm-12  col-md-10">{{$rental->description}}</p>
            </div>

          </div>
          <div class="services">


            @foreach ($rental->services as $service)

              <div class="services__item">
                <div class="content__services__item">
                  <i class="{{$service->icon}}"></i>
                </div>
                <span>{{$service->name}}</span>
              </div>
            @endforeach

          </div>
        </div>


        <div class="page__content__right">
          <div id="mapR">
          </div>
          <div id="search-panel" style="display:none">
          </div>

      </div>
    </div>

  </div>

</div>

</section>
<div id="send-message">
  <div class="contact-renter d-flex justify-content-center align-items-center">
    Contact renter
  </div>
  <div class=" message py-2 px-1"  style="display: none">
    <form class="" action="index.html" method="post">
      <div class="form-group">
        <input id="sender" type="email" class="form-control " name = "email" placeholder="Enter your E-mail">
      </div>
      <div class="form-group">

        <textarea id="content" class="form-control message" placeholder="Your Message" rows="10"></textarea>
      </div>

      <button id="btn" class="btn btn-primary">Send Message</button>

    </form>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(init);

  function init(){


    var etichetta = $('#send-message .contact-renter');

    etichetta.click(function(){

      $(this).siblings('.message').slideToggle();

    })

    //Invio messaggio
    jQuery('#btn').click(function(e){
             e.preventDefault();

             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

             jQuery.ajax({
                url: "{{ route('message.store') }}",
                method: 'post',
                data: {
                   content: jQuery('#content').val(),
                   sender : jQuery('#sender').val(),
                   user_id : {{ $rental->id }},
                   rental_id : {{ auth()->user()->id }}
                },
                success: function(result){
                   console.log(result);
                },
                error : function(error){
                  console.log(error);
                }
              });
          });

    //Mappa
    var latR = {{$rental->lat}};
    var lonR = {{$rental->lon}};
    var address = $("#address").text();
    console.log(address);

    var mapR = tomtom.L.map('mapR', {
      key: 'T1lAQG5AAAhzXmU8kZ5dB5zchnRTeyTG',
      center : [latR,lonR],
      zoom: 18
    });

    tomtom.fuzzySearch().query(address).go(function (result) {
     var latF = result[0].position.lat;
     var lonF = result[0].position.lon;


     var markers = new L.TomTomMarkersLayer().addTo(mapR);
     markers.setMarkersData([[latF,lonF]]);

     markers.addMarkers();
     map.fitBounds(markers.getBounds());
  });


}





</script>
@stop
