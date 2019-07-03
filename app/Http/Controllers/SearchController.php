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

      $rooms = (int)$request->rooms;
      $beds = (int)$request->beds;
      $beds = (int)$request->beds;
      $radius = (int)$request->radius;
      $lat = (float)$request->lat;
      $lon = (float)$request->lon;

      // mapping dell'array dei servizi per convertire gli id da stringa a intero
      $servicesIDs = array_map('intval', (array)$request->services);

      //inizializzazione query
      $q = Rental::query();

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


      if($rooms){
        $q->where('rooms','>=',  $rooms);

      }

      if($beds){
        $q->where('beds','>=',  $beds);

      }

      //clone della query
      $q2 = clone $q;
      //biforcazione della query sponsored e notSponsored
      $notSponsoredRentals = $q->notSponsored()->get();
      $sponsoredRentals = $q2->sponsored()->get();

      $result = array();
      $found = 0;
      $html = "";

      if($sponsoredRentals->count() > 0){
        $found += $sponsoredRentals->count();
        $html .= view('components.sponsored_rental-component', ['rentals' => $sponsoredRentals])->render();
      }

      if($notSponsoredRentals->count() > 0){

        $found += $notSponsoredRentals->count();
        $html .= view('components.rental-component', ['rentals' => $notSponsoredRentals] )->render();
      }
      $result["count"] = $found;
      $result['results'] = $html;

      return response()->json($result);


    }

  }
}
