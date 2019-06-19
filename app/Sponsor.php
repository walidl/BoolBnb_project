<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $fillable = [
      'name',
      'duration',
      'price'
    ];

    public function rentals(){
      return $this->belongsToMany(Rental::class);
    }
}
