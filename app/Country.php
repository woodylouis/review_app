<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    function manufacturers() {
        return $this->hasMany('App\Manufacturer');
    }
}
