@extends('layouts.app')

@section('content')

  <script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>
  <section id="payment-sponsor">

    <div class="container">
     <div class="row">

       <div class="col-md-8 col-md-offset-2">
         <form method="post" id="payment-form" action="{{route('payment.process',$rentalId)}}">

           @csrf
                <div class="options">
                  <h3>Chose sponsorization duration</h3>
                  @foreach ($sponsors as $sponsor)

                    <div class="form-check d-flex align-items-center">
                      <input class="mr-2" type="radio" name="sponsors" id="{{$sponsor->name}}" value="{{$sponsor->id}}">
                      <label class="form-check-label" for="{{$sponsor->name}}">
                        {{$sponsor->name}} ({{$sponsor->duration}}h) - {{$sponsor->price}} €
                      </label>
                    </div>
                  @endforeach

                    <div class="bt-drop-in-wrapper my-4">
                        <div id="bt-dropin"></div>
                    </div>
                </div>

                <input id="nonce" name="payment_method_nonce" type="hidden" />
                <button type="submit" class="btn btn-primary">Sponsor</button>

          </form>
       </div>
     </div>
  </div>
  </section>
  <script src="https://js.braintreegateway.com/web/dropin/1.18.0/js/dropin.min.js"></script>
    <script>
        var form = document.querySelector('#payment-form');
        var client_token = "{{$token}}";
        braintree.dropin.create({
          authorization: client_token,
          selector: '#bt-dropin',
          paypal: {
            flow: 'vault'
          }
        }, function (createErr, instance) {
          if (createErr) {
            console.log('Create Error', createErr);
            return;
          }
          form.addEventListener('submit', function (event) {
            event.preventDefault();
            instance.requestPaymentMethod(function (err, payload) {
              if (err) {
                console.log('Request Payment Method Error', err);
                return;
              }
              // Add the nonce to the form and submit
              document.querySelector('#nonce').value = payload.nonce;
              alert(payload.nonce);

              form.submit();
            });
          });
        });
    </script>
@stop
