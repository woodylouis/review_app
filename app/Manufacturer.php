<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    //
    function products() {
        return $this->hasMany('App\Product');
    }    
    
    function country() {
        return $this->belongsTo('App\Country');
    }
}
