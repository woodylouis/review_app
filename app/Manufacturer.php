<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    //a manufacturer has many products
    function products() {
        return $this->hasMany('App\Product');
    }    
    //a manufacturer belongs to a Country
    function country() {
        return $this->belongsTo('App\Country');
    }
}
