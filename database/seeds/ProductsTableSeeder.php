<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Apple manufacturer id is 1
        DB::table('products')->insert([
            'product_name' => 'iPhone Xs Max',
            'product_description' => 'Super Retina in two sizes — including the largest display ever on an iPhone. Even faster Face ID. The smartest, most powerful chip in a smartphone. And a breakthrough dual-camera system. iPhone XS is everything you love about iPhone. Taken to the extreme.',
            'price' => '2369',
            'manufacturer_id' => 1,
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        DB::table('products')->insert([
            'product_name' => 'iPhone Xs',
            'product_description' => 'The new iPhones are here, and with them, Apple has once again pushed the price of smartphones even higher—especially the iPhone Xs Max which starts at $1,799 and goes all the way up to a staggering $2,369 if you upgrade to 512GB of storage.',
            'price' => '1499',
            'manufacturer_id' => 1,
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        //Canon manufacturer id is 2
        DB::table('products')->insert([
            'product_name' => 'EOS 1DX II Full Frame DSLR Camera',
            'product_description' => 'The EOS-1D X Mark II shoots at 14 frames per second with full AF/AE tracking and in RAW and 16fps in Live View mode without auto focus.',
            'price' => '9499',
            'manufacturer_id' => 2,
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        //Huawei manufacturer id is 3
        DB::table('products')->insert([
            'product_name' => 'P20 Pro',
            'product_description' => 'Introducing the world’s first Leica Triple Camera. The HUAWEI P20 Pro pushes the boundaries of creative mobile photography. Inspired by the kinetics of light and precision-engineered to capture detailed, rich, atmospheric images any time of day or night.',
            'price' => '1099',
            'manufacturer_id' => 3,
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        //Microsoft manufacturer id is 4
        DB::table('products')->insert([
            'product_name' => 'Microsoft Surface Pro i5 128GB [8GB]',
            'product_description' => 'The new Surface Pro adapts to how you work, from powerful laptop to a tablet for entertainment and a studio for writing, sketching and drawing. Always with you for your next big idea, the new surface Pro is the most versatile Surface yet.',
            'price' => '1499',
            'manufacturer_id' => 4,
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        
        //Dell manufacturer id is 5
        DB::table('products')->insert([
            'product_name' => 'XPS 15 15.6" Touchscreen Laptop',
            'product_description' => 'Powered by 8th Gen Intel® Core™ i7 Processor, Windows 10 Home & 16GB memory. Featuring Dell Cinema with incredible colour, sound and streaming.',
            'price' => '3099',
            'manufacturer_id' => 5,
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
