<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
  protected $fillable =[ 'name','description','icon'];

  function rentals(){

    return $this->belongsToMany(Rental::class);
  }
}
