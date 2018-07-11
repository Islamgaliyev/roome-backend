<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArendatorInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arendator_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unique()->index();
            $table->string('phone_number')->nullable();
            $table->date('dob')->nullable();
            $table->string('avatar_url', 255)->nullable();
            $table->tinyInteger('sex')->default(0);
            $table->tinyInteger('activity')->default(0);
            $table->tinyInteger('family_status')->default(0);
            $table->tinyInteger('smoking')->default(0);
            
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });

        $data = array(
            array('id'=>1, 'user_id'=>3, 'phone_number'=>'87474324900', 'dob'=>'1997/08/20', 'sex'=>1, 'activity'=>2, 'family_status'=>0, 'smoking'=>1),
            array('id'=>2, 'user_id'=>4, 'phone_number'=>'87474324900', 'dob'=>'1997/08/20', 'sex'=>1, 'activity'=>1, 'family_status'=>1, 'smoking'=>3),
            array('id'=>3, 'user_id'=>5, 'phone_number'=>'87474324900', 'dob'=>'1997/08/20', 'sex'=>1, 'activity'=>0, 'family_status'=>2, 'smoking'=>0),
            array('id'=>4, 'user_id'=>6, 'phone_number'=>'87474324900', 'dob'=>'1997/08/20', 'sex'=>1, 'activity'=>3, 'family_status'=>1, 'smoking'=>2),
            array('id'=>5, 'user_id'=>7, 'phone_number'=>'87474324900', 'dob'=>'1997/08/20', 'sex'=>1, 'activity'=>2, 'family_status'=>1, 'smoking'=>1),

        );

         // DB::table('arendator_infos')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arendator_infos');
    }
}
