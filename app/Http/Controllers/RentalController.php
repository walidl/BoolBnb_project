<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RentalRequest;
use App\Rental;
use App\Service;

class RentalController extends Controller
{
  // public function showRentals(){
  //
  //   $sponsoredRentals = Rental::sponsored()->get();
  //   $notSponsoredRentals = Rental::notSponsored()->get();
  //   $rentals = $sponsoredRentals->merge($notSponsoredRentals);
  //
  //   return view('pages.show-rentals',compact('rentals'));
  // }

  public function showRental($id){


    $rental = Rental::findOrFail($id);

    return view('pages.rental-page',compact('rental'));
  }

  public function createRental(){

    $services = Service::all();
    return view('pages.new-rental',compact('services'));
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
    $rental->description = $validData['description'];

    $rental->rooms = $validData['rooms'];
    $rental->beds = $validData['beds'];
    $rental->bathrooms = $validData['bathrooms'];
    $rental->square_meters = $validData['square_meters'];
    $rental->address = $validData['address'];
    $rental->lat = $validData['lat'];
    $rental->lon = $validData['lon'];
    $rental->image = $fileNameToStore;
    $rental->user_id = auth()->user()->id;

    // Salva
    $rental->save();

    // Add Services
    $servicesIDs = $request->services;
    $services = Service::find($servicesIDs);
    $rental->services()->sync($services);

    return redirect(route('rental.show-all'));


  }

  public function editRental($id){
    $rental = Rental::findOrFail($id);

    if(auth()->user()->id != $rental->user->id){
      //Modifica permessa solo al proprietario dell'appartamento
      return redirect('/user/rentals');
    }else {
      $services = Service::all();
      return view('pages.edit-rental',compact('rental','services'));
    }
  }

  public function updateRental(RentalRequest $request,$id){
    $validateData = $request->validated();
    $rental = Rental::findOrFail($id);
    $rental->update($validateData);
    $rental->services()->sync($request->services);

    return redirect(route('user.rentals'));
  }

}
