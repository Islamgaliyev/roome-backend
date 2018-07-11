<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLandlordInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landlord_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unique()->index();
            $table->string('phone_number')->nullable();
            $table->date('dob')->nullable();
            $table->string('avatar_url', 255)->nullable();
            $table->tinyInteger('sex')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });

        $data = array(
            array('user_id'=>5),
            array('user_id'=>7),
        );

        // DB::table('landlord_infos')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('landlord_infos');
    }
}
