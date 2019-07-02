@extends('layouts.app')

@section('content')

  <div class="graph-container">
    <h2>Total views : {{$rental->views()->count()}}</h2>
    <canvas id="myChart"></canvas>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
  <script type="text/javascript">
    $(document).ready(
      function () {
        var values = [];

        values[0] = {{$rental->views()->whereMonth('created_at','1')->count()}};
        values[1] = {{$rental->views()->whereMonth('created_at','2')->count()}};
        values[2] = {{$rental->views()->whereMonth('created_at','3')->count()}};
        values[3] = {{$rental->views()->whereMonth('created_at','4')->count()}};
        values[4] = {{$rental->views()->whereMonth('created_at','5')->count()}};
        values[5] = {{$rental->views()->whereMonth('created_at','6')->count()}};
        values[6] = {{$rental->views()->whereMonth('created_at','7')->count()}};
        values[7] = {{$rental->views()->whereMonth('created_at','8')->count()}};
        values[8] = {{$rental->views()->whereMonth('created_at','9')->count()}};
        values[9] = {{$rental->views()->whereMonth('created_at','10')->count()}};
        values[10] = {{$rental->views()->whereMonth('created_at','11')->count()}};
        values[11] = {{$rental->views()->whereMonth('created_at','12')->count()}};

        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','September','October','November','December'],
            datasets: [{
              label: 'Views by month',
              backgroundColor: 'lightblue',
              data: values,
          }]
         },
         options : {
           scales : {
             yAxes : [{
               ticks : {
                 stepSize : 1
               }
             }]
           }
         }
        });
    }
  );
  </script>

@endsection
