@extends('layouts.app')

@section('content')
<section id="search-page" class="py-3">

  <div class="search-area py-4">
    <div class="container">

      <form>
        <div class="form-group d-flex align-items-center px-3 flex-wrap" >
          <div class="">
            <small>Place</small>
            <div id="search-panel" class="mr-2"></div>
          </div>
          <div class=" mr-2 input-container">
            <small>Distance (Km)</small>
            <input type="number"  min="20" class="form-control" id="radius" value="20">
          </div>


          {{-- Hidden --}}
          <input id="addr" type="hidden" name="address" value="">
          <input id="lat" type="hidden" class="coordinate" name="lat" value="">
          <input id="lon" type="hidden" class="coordinate" name="lon" value="">
          <div id="map" class="d-none" ></div>


          <div class="mr-2 input-container">
            <small>Rooms</small>
            <input type="number"  min="1" max="10" class="sensitive form-control" id="search-rooms">
          </div>
          <div class="mr-1 input-container">
            <small>Beds</small>
            <input type="number"  min="1" max="10" class="sensitive form-control" id="search-beds">
          </div>

        </div>
        <div class="container">

          <div class=" row mt-2 d-flex">
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
        </div>
      </form>

    </div>

  </div>
  <div class="container">
    <h3><span id="count"></span> Results</h3>
  </div>

  <div id="results" class=" container d-none">

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
        success: function (dataIn){

          // console.log(dataIn);

          $("#count").html(dataIn.count);

          if (dataIn.count > 0 ){

            $('#results').removeClass("d-none").find(".content").html(dataIn.results);

          }
          else{
            $('#results').addClass("d-none");
          }

        },
        error : function(request,status,error){

          console.log(request, "-",error);
        }
      })


    }

    //quando c'è un change nel form significativo la funzione raccoglie i valori dagli input e li manda alla fetch_data

    function formChange(){

      var query = {

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

    //detect change on .sensitive inputs
    $('.sensitive').on('input',function(){

      formChange();
    })

    //detect change on services checkboxes
    $('.services').change(
    function(event){

      $(event.target).parents(".service").find(".logo").toggleClass("active");

      formChange();
    });

    //detect change in latitude and longitude hidden inputs
    $('.coordinate').on('change',function(){

      formChange();
    })

    //click on "x" in tom tom input causes search by place to reset
    $("form").on("click", ".icon-close-gray",function(){

      $('#addr').val("");
      $('.coordinate').val("").trigger('change');

    })

    //detect change in radius input and calls formChange only if there is an address filled in its input
    $('#radius').on('input',function(){
      if($('#addr').val() != ""){
        formChange();

      }
    })

  })

</script>
@stop
