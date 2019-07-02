<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RentalRequest;
use App\Http\Requests\editrentalRequest;

use App\Rental;
use App\Service;
use App\RentalViews;
use App\User;

class RentalController extends Controller
{

  public function showRental($id){


    $rental = Rental::findOrFail($id);

    //Salvataggio visita
    $rentalview = new RentalViews();
    $rentalview->rental_id = $rental->id;
    $rentalview->ip = \Request::getClientIp();
    $rentalview->save();

    //Users UPR e UPRA
    $users = User::all();

    return view('pages.rental-page',compact('rental','users'));
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

    auth()->user()->update(["renting" => true]);

    return redirect(route('user.rentals'));


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

  public function updateRental(editrentalRequest $request,$id){

    $validateData = $request->validated();
    // dd($validateData);

    $rental = Rental::findOrFail($id);
    $rental->services()->sync($request->services);
    $rental->update([

      'title' => $validateData['title'],
      'description' => $validateData['description'],
      'rooms' => $validateData['rooms'],
      'beds' => $validateData['beds'],
      'bathrooms' => $validateData['bathrooms'],
      'square_meters' => $validateData['square_meters'],
      'address' => $validateData['address'],
      'lat' => $validateData['lat'],
      'lon' => $validateData['lon'],
    ]);

    if($request->hasFile('image')){

      //Unlink elimina l'immagine precedete
      // unlink(storage_path('app/public/images/'.$rental->image));
      $fileNameExt = $request->file('image')->getClientOriginalName();

      $fileName = pathinfo($fileNameExt,  PATHINFO_FILENAME);
      $fileExtension = $request->file('image')->getClientOriginalExtension();
      $fileNameToStore = $fileName.'_'.time().'.'.$fileExtension;

      $path = $request->file('image')->storeAs('public/images',$fileNameToStore);
      $rental->image = $fileNameToStore;
      $rental->save();
    }


    return redirect(route('user.rentals'));
  }

  public function showStat($id){
    $rental = Rental::findOrFail($id);
    return view('pages.rental-statistics',compact('rental'));
  }

}
