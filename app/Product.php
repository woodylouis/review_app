<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $fillable = ['product_name', 'product_description', 'price'];
    
    // a product should have a manufacturer
    function manufacturer() {
        return $this->belongsTo('App\Manufacturer');
    }
    
   
    function users() {
        return $this -> belongsToMany('App\User', 'reviews')->withPivot('rating')->withPivot('title')->withPivot('review_detail')->withTimestamps();

    }

}
