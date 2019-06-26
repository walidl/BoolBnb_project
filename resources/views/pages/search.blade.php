@extends('layouts.app')

@section('content')

  <div class="container">
    <form>
      <div class="form-group d-flex align-items-center px-3" >
        <div id="search-panel" class="mr-2"></div>

        <input id="addr" type="hidden" name="address" value="">
        <input id="lat" type="hidden" class="coordinate" name="lat" value="">
        <input id="lon" type="hidden" class="coordinate" name="lon" value="">

        <input type="number"  min="20" class="form-control col-3" id="radius" value="20">


        <div id="map" class="d-none" >
        </div>

      </div>
      {{-- <input type="text" class=" sensitive form-control " id="search-title" placeholder="Search"> --}}
      <div class="d-flex">

        <div class="form-group col-6">
          <label for="search-rooms">Rooms</label>
          <input type="number"  min="1" max="10" class=" sensitive form-control" id="search-rooms">
        </div>
        <div class="form-group col-6">
          <label for="search-beds">beds</label>
          <input type="number"  min="1" max="10" class=" sensitive form-control" id="search-beds">
        </div>
      </div>

      <div class="mt-2 d-flex">
        @foreach ($services as $service)
          <div class="d-flex flex-column align-items-center mx-2">
            <label class="m-0  ml-1 mr-2"><i class="{{$service->icon}}"></i>  </label><input type="checkbox" class="services " value="{{$service->id}}" >
          </div>
        @endforeach

      </div>
    </form>
    <div class="row">

    </div>
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
              $('.row').html(dataIn.card_data);
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
          function(){
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
  </div>
@stop
