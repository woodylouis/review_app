<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    //Two users types
    //Construct admin type refer to https://medium.com/employbl/easily-build-administrator-login-into-a-laravel-5-app-8a942e4fef37
    use Notifiable;
    const ADMIN_TYPE = 'admin';
    const DEFAULT_TYPE = 'default';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    function products() {
        return $this -> belongsToMany('App\Product', 'reviews')->withPivot('rating')->withPivot('title')->withPivot('review_detail')->withTimestamps();
    }
    
    function reviewers() {}
    
    
    public function isAdmin()
    {
        return $this->type === self::ADMIN_TYPE;
    }
    
}
