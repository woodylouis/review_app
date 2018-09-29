<?php

use Illuminate\Database\Seeder;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //iphone xs max
        DB::table('reviews')->insert([
            'title' => 'Great iphone xs MAX, worth the switch from Samsung S8+',
            'review_detail' => 'Good to have a wider key pad again, unrestricted by the roll off edges of the S8+ which seemed like wasted screen space and lacking functionality.',
            'rating' => 5,
            'user_id' => 1,
            'product_id' => 1,
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        //iphone xs
        DB::table('reviews')->insert([
            'title' => 'Excellent Night Photo',
            'review_detail' => 'If you are iPhone fan then no choice but I am not. So checked all double SIM phones and decided P20 Pro because I know Huawei is good value for money, good product (but not so user-friendly software)',
            'rating' => 3,
            'user_id' => 1,
            'product_id' => 2,
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
       
        DB::table('reviews')->insert([
            'title' => 'Great Phone, Great Features, Reasonable Price.',
            'review_detail' => 'OK so I have reviewed the iPhone X which died after a little rainwater and because of my disgust at the resolution from Apple led me to leave Apple and buy a brand I did not even know made smartphones.',
            'rating' => 3,
            'user_id' => 1,
            'product_id' => 5,
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        // 
        DB::table('reviews')->insert([
            'title' => 'Happy with my P20',
            'review_detail' => 'Have been really happy with the P20 over the last 12 months',
            'rating' => 4,
            'user_id' => 1,
            'product_id' => 4,
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        //
        DB::table('reviews')->insert([
            'title' => 'Reasonable Price',
            'review_detail' => 'This phone has a 40 megapixel camera and I must say even on the 10 megapixlel setting takes wonderful images, even in low light and especially at macro distance.',
            'rating' => 5,
            'user_id' => 2,
            'product_id' => 4,
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        
        DB::table('reviews')->insert([
            'title' => 'Happy with my iPhone Xs MAX',
            'review_detail' => 'Have been really happy with the iPhone X over the last 12 months. Took me a while to get used to a few upgrades but that was more of software upgrades.',
            'rating' => 5,
            'user_id' => 1,
            'product_id' => 1, 
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        DB::table('reviews')->insert([
            'title' => 'Battery looks l I me it might explode',
            'review_detail' => 'Bought a Dell xps 15 2 years back. Great pc super fast and the 4k screen is amazing. Then after a year or so I started noticing that the bottom of the pc started to get rather hot.',
            'rating' => 2,
            'user_id' => 2,
            'product_id' => 6, 
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        DB::table('reviews')->insert([
            'title' => 'Happy with my iPhone Xs MAX',
            'review_detail' => 'Have been really happy with the iPhone X over the last 12 months. Took me a while to get used to a few upgrades but that was more of software upgrades.',
            'rating' => 5,
            'user_id' => 2,
            'product_id' => 1, 
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        DB::table('reviews')->insert([
            'title' => 'Happy with my iPhone Xs MAX',
            'review_detail' => 'Have been really happy with the iPhone X over the last 12 months. Took me a while to get used to a few upgrades but that was more of software upgrades.',
            'rating' => 5,
            'user_id' => 3,
            'product_id' => 1, 
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        DB::table('reviews')->insert([
            'title' => 'Happy with my iPhone Xs MAX',
            'review_detail' => 'Have been really happy with the iPhone X over the last 12 months. Took me a while to get used to a few upgrades but that was more of software upgrades.',
            'rating' => 5,
            'user_id' => 4,
            'product_id' => 1, 
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        DB::table('reviews')->insert([
            'title' => 'Happy with my iPhone Xs MAX',
            'review_detail' => 'Have been really happy with the iPhone X over the last 12 months. Took me a while to get used to a few upgrades but that was more of software upgrades.',
            'rating' => 5,
            'user_id' => 5,
            'product_id' => 1, 
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
    }
}
