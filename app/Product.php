<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['product_name', 'product_description', 'price'];
        
    function manufacturer() {
        return $this->belongsTo('App\Manufacturer');
    }

}
