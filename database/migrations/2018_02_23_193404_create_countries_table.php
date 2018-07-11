<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('country_name');
            $table->tinyInteger('type');
            $table->float('latitude', 12, 9)->nullable();
            $table->float('longitude', 12, 9)->nullable();
            $table->tinyInteger('zoom');
            
            $table->timestamps();
        });

        DB::insert("insert into countries(id, country_name, type, latitude, longitude, zoom) values (1, 'Казахстан', 0, 51.2951000, 77.7497500 , 8);");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
