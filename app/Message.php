<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  protected $fillable = [
    'title',
    'content',
    'sent_date',
    'user_id',
    'rental_id'
  ];

  function user(){

    return $this->belongsTo(User::class);
  }

  function rental(){

    return $this->belongsTo(Rental::class);
  }
}
