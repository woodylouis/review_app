<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $fillable = ['product_name', 'product_description', 'price'];
    
    // a product should have a manufacturer
    function manufacturer() {
        return $this->belongsTo('App\Manufacturer', 'manufacturer_id');
    }
    
    // a product could have many reviews
    function reviews() {
        return $this->hasMany('App\Review')
    }

}
