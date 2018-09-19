<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('reviews', function(Blueprint $table){
            $table->increments('id');
            $table->string('title');
            $table->string('review_detail');
            $table->integer('rating');
            $table->integer('user_id'); //foreign key
            $table->integer('product_id'); //foreign key
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('reviews');

    }
}
