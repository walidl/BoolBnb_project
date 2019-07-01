<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rental;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function showUserRentals(){


      if(auth()->user()->renting){

        $rentals = Rental::where('user_id',auth()->user()->id)->orderBy('updated_at','DESC')->get();

        return view ('pages.show-rentals',compact('rentals'));
      }
      else{
        redirect('/');
      }
    }
}
