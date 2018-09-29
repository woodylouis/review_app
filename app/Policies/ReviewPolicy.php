<?php

namespace App\Policies;

use App\User;
use App\Review;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReviewPolicy
{
    use HandlesAuthorization;

    /**
     * Remember to go to app/Providers/AuthServiceProvider.php
     * 
     * Create a new policy instance.
     *
     * @return void
     */
    public function update(User $user, Review $review)
    {
        return $user->id === $review->user_id;
    } 
     
    public function destroy(User $user, Review $review)
    {
        return $user->id === $review->user_id;
    }
}
