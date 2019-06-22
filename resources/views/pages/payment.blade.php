@extends('layouts.app')

@section('content')

  <script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>
  <div class="container">
     <div class="row">


       <div class="col-md-8 col-md-offset-2">
         <form method="post" id="payment-form" action="{{route('payment.process',$rentalId)}}">

           @csrf
                <section>
                  @foreach ($sponsors as $sponsor)

                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="sponsors" id="{{$sponsor->name}}" value="{{$sponsor->id}}">
                      <label class="form-check-label" for="{{$sponsor->name}}">
                        {{$sponsor->name}} ({{$sponsor->duration}}h) - {{$sponsor->price}} $
                      </label>
                    </div>
                  @endforeach
                  {{-- <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                    Second default radio
                  </label>
                  </div> --}}

                    <div class="bt-drop-in-wrapper">
                        <div id="bt-dropin"></div>
                    </div>
                </section>

                <input id="nonce" name="payment_method_nonce" type="hidden" />
                <button class="button" type="submit"><span>Test Transaction</span></button>
            </form>
       </div>
     </div>
  </div>
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
