<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateComfortsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comforts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ad_id')->unique()->index();
            $table->boolean('wifi')->default(false);
            $table->boolean('lift')->default(false);
            $table->boolean('cupboard')->default(false);
            $table->boolean('kitchenware')->default(false);
            $table->boolean('iron')->default(false);
            $table->boolean('tv')->default(false);
            $table->boolean('cabel_tv')->default(false);
            $table->boolean('plastic_win')->default(false);
            $table->boolean('home_phone')->default(false);
            $table->boolean('parking_place')->default(false);
            $table->boolean('domofon')->default(false);
            $table->boolean('security')->default(false);
            $table->boolean('gate')->default(false);
            $table->boolean('street_lighting')->default(false);
            $table->boolean('washer')->default(false);
            $table->boolean('fen')->default(false);
            $table->boolean('shower_cabin')->default(false);
            $table->boolean('bath')->default(false);
            $table->boolean('dryer')->default(false);
            $table->boolean('vac')->default(false);
            $table->timestamps();

            $table->foreign('ad_id')->references('id')->on('ads');
        });


        // DB::table('comforts')->insert(array('ad_id'=>1, 'wifi'=>true, 'plastic_win'=>true, 'gate'=>true, 'tv'=>true));
        // DB::table('comforts')->insert(array('ad_id'=>2, 'fen'=>true, 'plastic_win'=>true, 'bath'=>true, 'tv'=>true));
        // DB::table('comforts')->insert(array('ad_id'=>3, 'parking_place'=>true, 'domofon'=>true, 'bath'=>true, 'security'=>true));
        // DB::table('comforts')->insert(array('ad_id'=>4, 'gate'=>true, 'cabel_tv'=>true, 'plastic_win'=>true, 'security'=>true));
        // DB::table('comforts')->insert(array('ad_id'=>5, 'wifi'=>true, 'plastic_win'=>true, 'gate'=>true, 'tv'=>true));
        // DB::table('comforts')->insert(array('ad_id'=>6, 'gate'=>true, 'cabel_tv'=>true, 'bath'=>true, 'security'=>true));

        // DB::table('comforts')->insert(array('ad_id'=>7, 'wifi'=>true, 'cabel_tv'=>true, 'gate'=>true, 'iron'=>true));
        // DB::table('comforts')->insert(array('ad_id'=>8, 'lift'=>true, 'cabel_tv'=>true, 'gate'=>true, 'tv'=>true));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comforts');
    }
}
