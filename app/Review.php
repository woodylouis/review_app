<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $fillable=['title', 'review_detail', 'rating', 'user_id', 'product_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    function products(){
       return  $this->belongsTo('App\Product','product_id');
    }
    
    // function likes() {
    //     return $this->hasMany('App\Like', 'review_id');
    // }
    
    function likes() {
        return $this->hasMany(Like::class);
    }
    
    
    function dislikes() {
        return $this->hasMany('App\Dislike', 'review_id');
    }

}