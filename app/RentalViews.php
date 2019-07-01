<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentalViews extends Model
{
   protected $fillable = [
     'rental_id',
     'ip'
   ];

   public function rental()
   {
       return $this->belongsTo('App\Rental');
   }
}
