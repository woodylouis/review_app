<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsPhoto extends Model
{
    //
    protected $fillable = ['product_id', 'user_id', 'filename'];
    
    function users() {
        return $this->belongsTo('App\User');
    }
    
    function products() {
        return $this->belongsTo('App\Product');
    }
    
}
