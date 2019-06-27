@extends('layouts.app')

@section('content')
<section id="search-page">

  <div class="search-area py-4">
    <div class="container">
    <form>
      <div class="form-group d-flex align-items-center px-3" >
        <div class="">
          <small>Place</small>
          <div id="search-panel" class="mr-2"></div>
        </div>
        <div class=" input-container">
          <small>Distance (Km)</small>
          <input type="number"  min="20" class="form-control" id="radius" value="20">
        </div>


        {{-- Hidden --}}
        <input id="addr" type="hidden" name="address" value="">
        <input id="lat" type="hidden" class="coordinate" name="lat" value="">
        <input id="lon" type="hidden" class="coordinate" name="lon" value="">
        <div id="map" class="d-none" ></div>


        <div class="mx-2 input-container">
          <small>Rooms</small>
          <input type="number"  min="1" max="10" class="sensitive form-control" id="search-rooms">
        </div>
        <div class="mx-1 input-container">
          <small>Beds</small>
          <input type="number"  min="1" max="10" class="sensitive form-control" id="search-beds">
        </div>

      </div>
      {{-- <input type="text" class=" sensitive form-control " id="search-title" placeholder="Search"> --}}

      <div class="mt-2 d-flex">
        @foreach ($services as $service)
          <div class="service m-2">
            <label class="switch">

              <input type="checkbox" class="services default" value="{{$service->id}}">
              <span class="slider round"></span>
            </label>
            <label class="check-lab m-0  mx-1"><i class=" logo {{$service->icon}}"></i>  </label>

          </div>
        @endforeach

      </div>
    </form>



  </div>

  </div>

  <div id="sponsored" class=" container d-none">

    <h3>Sponsored</h3>
    <div class="row content">

    </div>

  </div>

  <div id="results" class=" container d-none">

    <h3>Results</h3>
    <div class=" row content">

    </div>

  </div>

</section>
  <script type="text/javascript">

  $(document).ready(function(){

    fetch_data();

    function fetch_data(query = {}){

      $.ajax({

        url: "{{ route('search.action')}}",
        method: 'GET',
        data : query,
        // dataType:'json',
        success: function (dataIn){

          console.log(dataIn);


          if (dataIn.sponsored){

            $('#sponsored').removeClass("d-none").find(".content").html(dataIn.sponsored);

          }
          else{
            $('#sponsored').addClass("d-none");

          }
          if (dataIn.not_sponsored){

            $('#results').removeClass("d-none").find(".content").html(dataIn.not_sponsored);

          }
          else{
            $('#results').addClass("d-none");

          }
          //   if
          //   $('.row').html(dataIn.card_data);
        },
        error : function(request,status,error){

          console.log(request, "-",error);
        }
      })


    }


    function formChange(){

      var query = {

        // title: $('#search-title').val(),
        rooms: $('#search-rooms').val(),
        beds: $('#search-beds').val(),
        radius: $('#radius').val(),
        lat : $('#lat').val(),
        lon : $('#lon').val(),

        services: $('.services:checked').map(function(){
          return $(this).val();
        }).get()
      };
      console.log(query);

      fetch_data(query);
    }
    $('.sensitive').on('input',function(){

      formChange();
    })

    $('.services').change(
    function(event){

      $(event.target).parents(".service").find(".logo").toggleClass("active");

      formChange();
    });

    $('.coordinate').on('change',function(){

      formChange();
    })

    $("form").on("click", ".icon-close-gray",function(){

      $('#addr').val("");
      $('.coordinate').val("").trigger('change');

    })

    $('#radius').on('input',function(){
      if($('#addr').val() != ""){
        formChange();

      }
    })

  })

</script>
@stop
