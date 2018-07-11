<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespondsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('ad_id')->index();
            $table->tinyInteger('status');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('ad_id')->references('id')->on('ads');
        });

        $data = array( 
            array('ad_id' => 2, 'user_id' => 4, 'status' => 0),
            array('ad_id' => 2, 'user_id' => 5, 'status' => 0),
            array('ad_id' => 2, 'user_id' => 6, 'status' => 0),
            array('ad_id' => 3, 'user_id' => 4, 'status' => 0),
            array('ad_id' => 4, 'user_id' => 6, 'status' => 0),
            array('ad_id' => 5, 'user_id' => 4, 'status' => 0),
            array('ad_id' => 5, 'user_id' => 6, 'status' => 0),
            array('ad_id' => 5, 'user_id' => 5, 'status' => 0),
            array('ad_id' => 6, 'user_id' => 3, 'status' => 1),
            array('ad_id' => 7, 'user_id' => 5, 'status' => 1),
            array('ad_id' => 8, 'user_id' => 6, 'status' => 1),
        );

        // DB::table('responds')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responds');
    }
}
