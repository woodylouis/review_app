<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dislike extends Model
{
    
    protected $fillable = ['review_id', 'user_id'];
    // A dislike should belong to a review
    function reviews() {
        return $this->belongsTo('App\Review', 'review_id');
    }
    
    function users() {
        return $this->belongsTo('App\User');
    }
}
