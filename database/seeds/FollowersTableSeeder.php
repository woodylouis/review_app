<?php

use Illuminate\Database\Seeder;
use App\User;

class FollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $user = $users->first();
        $user_id = $user->id;

        //get all users except user with id 1
        $followers = $users->slice(1);
        $follower_ids = $followers->pluck('id')->toArray();

        //follow all users except user with id 1
        $user->follow($follower_ids);

        // Apart from user with id 1, all users follow user with id 1
        foreach ($followers as $follower) {
            $follower->follow($user_id);
        }
    }
}
