<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
  protected $fillable =['title','rooms','beds','bathrooms','bedrooms','square_meters','address','user_id'];

  function services(){

    return $this->belongsToMany(Service::class);
  }

  function user(){

    return $this->belongsTo(User::class);
  }

  function messages(){

    return $this->hasMany(Message::class);
  }
}
