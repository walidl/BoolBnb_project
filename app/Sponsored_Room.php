<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsored_Room extends Model
{
  protected $fillable = [
    'sponsor_id',
    'rental_id',
    'end_date'
  ];
}
