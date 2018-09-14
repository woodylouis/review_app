<?php

use Illuminate\Database\Seeder;

class ManufacturersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // country id = 1 United State
        DB::table('manufacturers')->insert([
            'manufacturer_name' => 'Apple',
            'country_id' => 1,
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        // country id = 2 Japan
        DB::table('manufacturers')->insert([
            'manufacturer_name' => 'Canon',
            'country_id' => 2,
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        // country id = 3 China
        DB::table('manufacturers')->insert([
            'manufacturer_name' => 'Huawei',
            'country_id' => 3,
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        // country id = 1 United Stated
        DB::table('manufacturers')->insert([
            'manufacturer_name' => 'Microsoft',
            'country_id' => 1,
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        // country id = 1 United Stated
        DB::table('manufacturers')->insert([
            'manufacturer_name' => 'Dell',
            'country_id' => 1,
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
