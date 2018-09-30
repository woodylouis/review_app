<?php

namespace App;
use Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\ProductsPhoto;
use App\Like;
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
    
    function productsPhotos() {
        return $this -> hasMany(ProductsPhoto::class);
    }
    
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
    
    function likes() {
        return $this->hasMany(Like::class);
    }
    
    function dislikes() {
        return $this->hasMany(Dislike::class);
    }
    
    public function isAdmin()
    {
        return $this->type === self::ADMIN_TYPE;
    }
    
    //get followers
    public function followers()
    {
        return $this->belongsToMany(User::Class, 'followers', 'user_id', 'follower_id');
    }
    
    //get people that the user follow
    public function followings()
    {
        return $this->belongsToMany(User::Class, 'followers', 'follower_id', 'user_id');
    }
    
    //Is_array is used to determine if the parameter is an array. If it is already an array, there is no need to use the compact method. 
    public function follow($user_ids)
    {
        if (!is_array($user_ids)) {
            $user_ids = compact('user_ids');
        }
        $this->followings()->sync($user_ids, false);
    }

    public function unfollow($user_ids)
    {
        if (!is_array($user_ids)) {
            $user_ids = compact('user_ids');
        }
        $this->followings()->detach($user_ids);
    }
    
    //A method to determine whether the currently logged in user A is concerned about user B.
    public function isFollowing($user_id)
    {
        return $this->followings->contains($user_id);
    }
    public function feed()
    {
        $user_ids = Auth::user()->followings->pluck('id')->toArray();
        array_push($user_ids, Auth::user()->id);
        return Status::whereIn('user_id', $user_ids)
                              ->with('user')
                              ->orderBy('created_at', 'desc');
    }
}
