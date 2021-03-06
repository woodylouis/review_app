<?php

namespace App\Policies;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    
    // only and only if $currentUser and $user are the same, pass authentication, else HTTP 403 error
    public function update(User $currentUser, User $user)
    {
        return $currentUser->id === $user->id;
    }
    
    public function destroy(User $currentUser, User $user)
    {
        return $currentUser -> type == 'admin' && $currentUser->id !== $user->id;
    }
}
