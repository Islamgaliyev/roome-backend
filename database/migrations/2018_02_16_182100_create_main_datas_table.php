<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateMainDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ad_id')->unique()->index();
            $table->tinyInteger('room_amount')->nullable();
            $table->tinyInteger('bathroom_amount')->nullable();
            $table->tinyInteger('beds_amount')->nullable();
            $table->tinyInteger('house_type')->nullable();
            $table->integer('house_area')->nullable();
            $table->integer('price');
            $table->timestamps();

            $table->foreign('ad_id')->references('id')->on('ads');
        });


        $data = array(
            array('id'=>1 , 'ad_id'=>1, 'room_amount'=>2, 'bathroom_amount'=>1,
                'beds_amount'=>1, 'house_type'=>1, 'house_area'=>90, 'price'=> 190000),
            array('id'=>2 , 'ad_id'=>2, 'room_amount'=>3, 'bathroom_amount'=>2,
                'beds_amount'=>2, 'house_type'=>0, 'house_area'=>90, 'price'=> 80000),
            array('id'=>3 , 'ad_id'=>3, 'room_amount'=>4, 'bathroom_amount'=>1,
                'beds_amount'=>3, 'house_type'=>2, 'house_area'=>90, 'price'=> 70000),
            array('id'=>4 , 'ad_id'=>4, 'room_amount'=>1, 'bathroom_amount'=>1,
                'beds_amount'=>4, 'house_type'=>0, 'house_area'=>90, 'price'=> 60000),
            array('id'=>5 , 'ad_id'=>5, 'room_amount'=>2, 'bathroom_amount'=>1,
                'beds_amount'=>2, 'house_type'=>2, 'house_area'=>90, 'price'=> 100000),
            array('id'=>6 , 'ad_id'=>6, 'room_amount'=>3, 'bathroom_amount'=>1,
                'beds_amount'=>3, 'house_type'=>1, 'house_area'=>90, 'price'=> 13000),

            array('id'=>7 , 'ad_id'=>7, 'room_amount'=>4, 'bathroom_amount'=>1,
                'beds_amount'=>5, 'house_type'=>2, 'house_area'=>90, 'price'=> 140000),
            array('id'=>8 , 'ad_id'=>8, 'room_amount'=>6, 'bathroom_amount'=>2,
                'beds_amount'=>4, 'house_type'=>1, 'house_area'=>90, 'price'=> 22000),
        );

        // DB::table('main_datas')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('main_datas');
    }
}
