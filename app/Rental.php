<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
  protected $fillable =['title','rooms','beds','bathrooms','bedrooms','square_meters','address','user_id'];

  function services(){

    return $this->belongsToMany(Service::class)->withTimestamps();
  }

  function user(){

    return $this->belongsTo(User::class);
  }

  public function sponsors(){

    return $this->belongsToMany(Sponsor::class)->withTimestamps()->withPivot('created_at');
  }

  function messages(){

    return $this->hasMany(Message::class);
  }

  function isSponsored(){

    if(count($this->sponsors) == 0){

      return false;
    }
    else{
      $sponsor = $this->sponsors->last();
      $date = $sponsor->pivot->created_at;
      $sponsorDuration  = $sponsor->duration;
      $endDate = date('Y-m-d H:i',strtotime('+'. $sponsorDuration.' hour',strtotime($date)));
      $currentDate = date('Y-m-d H:i');
      $logica = "$date + $sponsorDuration h =  $endDate ";
      // return "$currentDate -- $endDate";
      if(strtotime($endDate) > strtotime($currentDate)){

        return true;
      }
      else{
        return false;
      }

    }
  }
}
