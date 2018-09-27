<?php

use Illuminate\Database\Seeder;

class LikeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('likes')->insert([
            'review_id' => 1,
            'user_id' => 4,
        ]);
        
        DB::table('likes')->insert([
            'review_id' => 1,
            'user_id' => 5,
        ]);
        
        DB::table('likes')->insert([
            'review_id' => 2,
            'user_id' => 5,
        ]);
        
        DB::table('likes')->insert([
            'review_id' => 5,
            'user_id' => 5,
        ]);
        
        DB::table('likes')->insert([
            'review_id' => 5,
            'user_id' => 1,
        ]);
    }
}
