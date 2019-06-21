<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RentalRequest;
use App\Rental;

class RentalController extends Controller
{
  public function showRentals(){

    $rentals = Rental::orderBy('updated_at','desc')->get();

    // dd($rentals);

    return view('pages.show-rentals',compact('rentals'));
  }

  public function sponsoredRentals(){


    
  }

  public function createRental(){


    return view('pages.new-rental');
  }
  public function storeRental(RentalRequest $request){

    $validData = $request->validated();

    if($request->hasFile('image')){

      $fileNameExt = $request->file('image')->getClientOriginalName();

      $fileName = pathinfo($fileNameExt,  PATHINFO_FILENAME);
      $fileExtension = $request->file('image')->getClientOriginalExtension();
      $fileNameToStore = $fileName.'_'.time().'.'.$fileExtension;

      $path = $request->file('image')->storeAs('public/images',$fileNameToStore);

    }
    //Crea nuovo post
    $rental = new Rental;
    //Inserimento valori validati
    $rental->title = $validData['title'];
    $rental->rooms = $validData['rooms'];
    $rental->bedrooms = $validData['bedrooms'];
    $rental->bathrooms = $validData['bathrooms'];
    $rental->square_meters = $validData['square_meters'];
    $rental->address = $validData['address'];
    $rental->image = $fileNameToStore;



    // Salva
    $rental->save();

    return redirect(route('rental.show-all'));


  }

}
