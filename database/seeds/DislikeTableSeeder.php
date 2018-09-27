<?php

use Illuminate\Database\Seeder;

class DislikeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('dislikes')->insert([
            'review_id' => 7,
            'user_id' => 1,
        ]);
        
        DB::table('dislikes')->insert([
            'review_id' => 7,
            'user_id' => 3,
        ]);
        
        DB::table('dislikes')->insert([
            'review_id' => 6,
            'user_id' => 1,
        ]);
        
        DB::table('dislikes')->insert([
            'review_id' => 1,
            'user_id' => 4,
        ]);
        
        DB::table('dislikes')->insert([
            'review_id' => 5,
            'user_id' => 1,
        ]);
    }
}
