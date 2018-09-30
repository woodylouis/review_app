<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsPhoto extends Model
{
    //
    protected $fillable = ['product_id', 'user_name', 'filename'];
    
    function users() {
        return $this->belongsTo(User::class);
    }
    
    function products() {
        return $this->belongsTo('App\Product');
    }
    
}
