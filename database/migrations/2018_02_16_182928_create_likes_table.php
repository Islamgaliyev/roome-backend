<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ad_id')->index();
            $table->integer('user_id')->index();
            $table->timestamps();


            $table->foreign('ad_id')->references('id')->on('ads');
            $table->foreign('user_id')->references('id')->on('users');
        });

        $data = array(
            array('ad_id' => 1, 'user_id' => 4),
            array('ad_id' => 1, 'user_id' => 3),
            array('ad_id' => 1, 'user_id' => 5),
            array('ad_id' => 2, 'user_id' => 4),
            array('ad_id' => 2, 'user_id' => 5),
            array('ad_id' => 3, 'user_id' => 4),
            array('ad_id' => 4, 'user_id' => 4),
            array('ad_id' => 4, 'user_id' => 6),
            array('ad_id' => 5, 'user_id' => 7),
            array('ad_id' => 5, 'user_id' => 4),
            array('ad_id' => 5, 'user_id' => 3),
            array('ad_id' => 6, 'user_id' => 4),
            array('ad_id' => 7, 'user_id' => 4),
            array('ad_id' => 8, 'user_id' => 4),
        );

        // DB::table('likes')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
