<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nears', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('place_id')->unique();
            $table->boolean('univer')->default(false);
            $table->boolean('grocer')->default(false);
            $table->boolean('school')->default(false);
            $table->boolean('playschool')->default(false);
            $table->boolean('hospital')->default(false);
            $table->boolean('sport_complex')->default(false);
            $table->boolean('mart')->default(false);
            $table->boolean('pharmacy')->default(false);
            
            $table->timestamps();

            $table->foreign('place_id')->references('id')->on('places');

        });

        $data = array(
            array('place_id'=>1, 'univer'=>true, 'grocer'=>false, 'school'=>true, 'playschool'=>true, 'hospital'=> true, 'sport_complex'=>false, 'mart'=>true, 'pharmacy'=> false),
            array('place_id'=>2, 'univer'=>false, 'grocer'=>true, 'school'=>true, 'playschool'=>true, 'hospital'=> true, 'sport_complex'=>true, 'mart'=>false, 'pharmacy'=> true),
            array('place_id'=>3, 'univer'=>true, 'grocer'=>false, 'school'=>true, 'playschool'=>true, 'hospital'=> true, 'sport_complex'=>false, 'mart'=>true, 'pharmacy'=> false),
            array('place_id'=>4, 'univer'=>true, 'grocer'=>false, 'school'=>true, 'playschool'=>true, 'hospital'=> false, 'sport_complex'=>true, 'mart'=>false, 'pharmacy'=> true),
            array('place_id'=>5, 'univer'=>true, 'grocer'=>false, 'school'=>false, 'playschool'=>true, 'hospital'=> false, 'sport_complex'=>true, 'mart'=>true, 'pharmacy'=> true),
            array('place_id'=>6, 'univer'=>true, 'grocer'=>false, 'school'=>true, 'playschool'=>true, 'hospital'=> true, 'sport_complex'=>true, 'mart'=>true, 'pharmacy'=> true),
            array('place_id'=>7, 'univer'=>false, 'grocer'=>true, 'school'=>true, 'playschool'=>true, 'hospital'=> true, 'sport_complex'=>true, 'mart'=>true, 'pharmacy'=> true),
            array('place_id'=>8, 'univer'=>true, 'grocer'=>false, 'school'=>false, 'playschool'=>true, 'hospital'=> false, 'sport_complex'=>true, 'mart'=>true, 'pharmacy'=> false),
        );

        // DB::table('nears')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nears');
    }
}
