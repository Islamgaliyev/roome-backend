<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->tinyInteger('status');
            $table->integer('like_amount');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });

        $data = array(
            array('id'=>1, 'user_id'=>1, 'status'=>4, 'like_amount' => 3),
            array('id'=>2, 'user_id'=>2, 'status'=>4, 'like_amount' => 2),
            array('id'=>3, 'user_id'=>1, 'status'=>4, 'like_amount' => 1),
            array('id'=>4, 'user_id'=>2, 'status'=>4, 'like_amount' => 2),
            array('id'=>5, 'user_id'=>1, 'status'=>4, 'like_amount' => 3),
            array('id'=>6, 'user_id'=>2, 'status'=>4, 'like_amount' => 1),
            array('id'=>7, 'user_id'=>2, 'status'=>4, 'like_amount' => 1),
            array('id'=>8, 'user_id'=>1, 'status'=>4, 'like_amount' => 1),
        );
        
        // DB::table('ads')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
}
