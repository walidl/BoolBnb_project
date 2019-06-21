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

    return $this->belongsToMany(Sponsor::class)->withTimestamps()->withPivot('end_date');
  }

  function messages(){

    return $this->hasMany(Message::class);
  }

  public function scopeSponsored($query)
    {

      $pivot = $this->sponsors()->getTable();
      $currentDate = date('Y-m-d H:i');
       return $query->whereHas('sponsors', function ($query) use($pivot,$currentDate){
          $query->where("{$pivot}.end_date", '>', $currentDate);

        });

    }
    public function scopeNotSponsored($query)
      {

        $pivot = $this->sponsors()->getTable();
        $currentDate = date('Y-m-d H:i');
        return $query->whereDoesntHave('sponsors')
                     ->orwhereDoesntHave('sponsors', function ($query) use($pivot,$currentDate){
           $query->where("{$pivot}.end_date", '>', $currentDate);

         });

      }

  function isSponsored(){

    if(count($this->sponsors) == 0){

      return false;
    }
    else{

      $sponsor = $this->sponsors->last();

      $endDate = $sponsor->pivot->end_date;
      $currentDate = date('Y-m-d H:i:s');

      if(strtotime($endDate) > strtotime($currentDate)){

        return true;
      }
      else{
        return false;
      }

    }
  }
}
