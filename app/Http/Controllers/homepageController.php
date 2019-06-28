<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rental;

class homepageController extends Controller
{
  public function homepageView(){


    $rentals = Rental::notSponsored()->get();

    return view('pages.homeBool',compact('rentals'));
  }
}
