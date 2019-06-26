<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rental;
use App\Service;

class SearchController extends Controller
{

  public function searchIndex(){

    $services = Service::all();

    return view('pages.search',compact('services'));
  }

  public function action (Request $request){

    if($request->ajax()){

      // $title = $request->title;
      $rooms = (int)$request->rooms;
      $beds = (int)$request->beds;
      $beds = (int)$request->beds;
      $radius = (int)$request->radius;
      $lat = (float)$request->lat;
      $lon = (float)$request->lon;

      // $servicesIDs = (array)$request->services;

      $servicesIDs = array_map('intval', (array)$request->services);
      // echo json_encode($request);
      $q = Rental::query();
      // $q->notSponsored();

      if( count($servicesIDs) > 0){

        foreach($servicesIDs as $serviceId){
          $q->whereHas('services', function($query) use ($serviceId){
            $query->where('service_id', $serviceId);
          });
        }
      }

      if($lat && $lon){

        $q->distance($lat,$lon,$radius);
      }

      // if($title){
      //   $q->where('title','LIKE', '%'. $title.'%');
      //
      // }
      if($rooms){
        $q->where('rooms','>=',  $rooms);

      }

      if($beds){
        $q->where('bedrooms','>=',  $beds);

      }

      $rentals = $q->get();


      if($rentals->count() > 0){

        $html = view('components.rental-component', compact('rentals'))->render();

      }
      else{

        $html = '<p>no data found</p>';
      }

      return response()->json([
        'card_data' => $html
      ]);

      // $data = array(
      //
      //   'card_data' => $html
      // );
      // echo json_encode($data);
    }

  }
}
