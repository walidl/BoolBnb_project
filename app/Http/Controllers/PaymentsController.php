<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sponsor;
use App\Rental;

use Braintree_Transaction;
use Braintree_Gateway;


class PaymentsController extends Controller
{
  public function selectSponsor($id){

    $rental = Rental::findOrFail($id);

    if($rental->isSponsored()){

      return redirect(route('rental.show-all'));
    }


    $sponsors = Sponsor::all();


    $gateway = new Braintree_Gateway([
        'environment' => env('BRAINTREE_ENV'),
        'merchantId' => env('BRAINTREE_MERCHANT_ID'),
        'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
        'privateKey' => env('BRAINTREE_PRIVATE_KEY')
    ]);

    $token = $gateway->ClientToken()->generate();

    return view('pages.payment',compact('sponsors','token'))->with('rentalId',$id);
  }

    public function process($rentalId,Request $request)
    {
      $gateway = new Braintree_Gateway([
          'environment' => env('BRAINTREE_ENV'),
          'merchantId' => env('BRAINTREE_MERCHANT_ID'),
          'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
          'privateKey' => env('BRAINTREE_PRIVATE_KEY')
      ]);

      // dd($request->all());
      // dd($rentalId);

      $sponsor = Sponsor::findOrFail($request->sponsors);

      $amount = $sponsor->price;
      $nonce = $request->payment_method_nonce;
      $result = $gateway->transaction()->sale([
        'amount' => $amount,
        'paymentMethodNonce' => "fake-valid-nonce",
        'options' => [
          'submitForSettlement' => true
          ]
      ]);
      if ($result->success || !is_null($result->transaction)) {
          $transaction = $result->transaction;
          $this->addSponsor($rentalId,$sponsor);
          return redirect(route('rental.show-all'));
      } else {
          $errorString = "";
          foreach($result->errors->deepAll() as $error) {
            $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            return view('errorpage')->with('error',$errorString);

          }
          $_SESSION["errors"] = $errorString;
        }
    }


    public function addSponsor($rentalId,$sponsor){

      $rental = Rental::findOrFail($rentalId);
      $sponsorDuration = $sponsor->duration;
      $currentDate = date('Y-m-d H:i:s');
      $endDate = date('Y-m-d H:i:s',strtotime('+'. $sponsorDuration.' hour',strtotime($currentDate)));
      $rental->sponsors()->attach($sponsor,['end_date' => $endDate]);
    }
}
