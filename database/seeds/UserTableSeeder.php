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
        DB::table('users')->insert([
            'name' => 'louis',
            'email' => 'louis@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'wenjin',
            'email' => 'wenjin@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'Moderator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
