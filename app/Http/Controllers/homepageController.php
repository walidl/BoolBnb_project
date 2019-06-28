<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rental;

class homepageController extends Controller
{
  function homeRental(){

    $rentals = Rental::notSponsored()->get();

    return view('homeBool', compact('rentals'));
  }
}
