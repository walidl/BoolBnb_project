<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $fillable = [
      'name',
      'rental_id',
      'duration',
      'price'
    ];
}
