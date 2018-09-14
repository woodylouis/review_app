<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('countries')->insert([
            'country' => 'United State',
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        DB::table('countries')->insert([
            'country' => 'Japan',
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        DB::table('countries')->insert([
            'country' => 'China',
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
