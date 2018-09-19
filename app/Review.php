<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $fillable=['title', 'review_detail', 'rating', 'user_id', 'product_id'];
    
    function reviewers(){
       return  $this->belongsTo('App\User','user_id');
    }
    
    function products(){
       return  $this->belongsTo('App\Product','product_id');
    }

}