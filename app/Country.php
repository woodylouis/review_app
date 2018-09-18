<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    // a country can have many manufacturers
    function manufacturers() {
        return $this->hasMany('App\Manufacturer');
    }
}
