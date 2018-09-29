<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use app\Review;
use App\ProductsPhoto;
class Product extends Model
{
    
    protected $fillable = ['product_name', 'product_description', 'price'];
    
    // a product should have a manufacturer
    function manufacturer() {
        return $this->belongsTo('App\Manufacturer');
    }
    
    // function reviews() {
    //     return $this->hasMany('App\Review');
    // }
   
    function users() {
        return $this -> belongsToMany('App\User', 'reviews')->withPivot('id')->withPivot('rating')->withPivot('title')->withPivot('review_detail')->withTimestamps();
    }
    
    function photos() {
        return $this -> hasMany(ProductsPhoto::class);
    }
    

    // function reviews() {
    //     return $this -> belongsToMany('App\Review', 'likes')->withPivot('review_id')->withTimestamps();
    // }
}
