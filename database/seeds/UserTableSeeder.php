<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // $users = factory(User::class)->times(50)->make();
        // User::insert($users->makeVisible(['password', 'remember_token'])->toArray());

        // $user = User::find(1);
        // $user->name = 'admin';
        // $user->email = 'admin@gmail.com';
        // $user->password = bcrypt('password');
        // $user->type = 'admin';
        // $user->save();
        DB::table('users')->insert([
            'name' => 'Moderator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'date_of_birth' => '2014-05-06',
            'type' => 'admin',
        ]);
        
        DB::table('users')->insert([
            'name' => 'louis',
            'email' => 'louis@gmail.com',
            'password' => bcrypt('123456'),
            'date_of_birth' => '2014-05-06',
        ]);
        
        DB::table('users')->insert([
            'name' => 'wenjin',
            'email' => 'wenjin@gmail.com',
            'password' => bcrypt('123456'),
            'date_of_birth' => '2014-05-06',
        ]);
    
        
        DB::table('users')->insert([
            'name' => 'edwin',
            'email' => 'edwin@gmail.com',
            'password' => bcrypt('123456'),
            'date_of_birth' => '2014-05-06',
        ]);
        
        DB::table('users')->insert([
            'name' => 'tony',
            'email' => 'tony@gmail.com',
            'password' => bcrypt('123456'),
            'date_of_birth' => '2014-05-06',

        ]);
        
        DB::table('users')->insert([
            'name' => 'albert',
            'email' => 'albert@gmail.com',
            'password' => bcrypt('123456'),
            'date_of_birth' => '2014-05-06',

        ]);
        
        DB::table('users')->insert([
            'name' => 'young',
            'email' => 'young@gmail.com',
            'password' => bcrypt('123456'),
            'date_of_birth' => '2014-05-06',

        ]);
    }
}
