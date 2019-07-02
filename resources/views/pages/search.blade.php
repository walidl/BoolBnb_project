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
        // dataType:'json',
        success: function (dataIn){

          console.log(dataIn);



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
