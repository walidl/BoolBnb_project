<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
  protected $fillable =['title','rooms','beds','bathrooms','bedrooms','square_meters','address'];

  function services(){

    return $this->belongsToMany(Service::class);
  }
}
