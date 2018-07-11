<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('region_name')->nullable();
            $table->tinyInteger('country_id')->nullable();
            $table->tinyInteger('type')->nullable();
            $table->float('latitude', 12, 9)->nullable();
            $table->float('longitude', 12, 9)->nullable();
            $table->tinyInteger('zoom')->nullable();
            
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('countries');

        });

        DB::insert("insert into regions(id) values (0);");

        DB::insert("insert into regions(id, region_name, country_id, type, latitude, longitude, zoom) values (3, 'Акмолинская обл.', 1, 1, 52.1358, 70.0004, 6);
            ");
        DB::insert("insert into regions(id, region_name, country_id, type, latitude, longitude, zoom) values (4, 'Актюбинская обл.', 1, 1, 49.1891, 57.2893, 7);
            ");

        DB::insert("insert into regions(id, region_name, country_id, type, latitude, longitude, zoom) values (5, 'Алматинская обл.', 1, 1, 45.2151, 77.3393, 6);
            ");

        DB::insert("insert into regions(id, region_name, country_id, type, latitude, longitude, zoom) values (6, 'Атырауская обл.', 1, 1, 47.3865, 52.5799, 7);
            ");
        DB::insert("insert into regions(id, region_name, country_id, type, latitude, longitude, zoom) values (7, 'Восточно-Казахстанская обл.', 1, 1, 48.8247, 81.2285, 6);
            ");
        DB::insert("insert into regions(id, region_name, country_id, type, latitude, longitude, zoom) values (8, 'Жамбылская обл.', 1, 1, 44.2558, 72.0988, 6);
            ");
        DB::insert("insert into regions(id, region_name, country_id, type, latitude, longitude, zoom) values (9, 'Западно-Казахстанская обл.', 1, 1, 49.989, 50.5107, 7);
            ");
        DB::insert("insert into regions(id, region_name, country_id, type, latitude, longitude, zoom) values (10, 'Карагандинская обл.', 1, 1, 49.5734, 73.7798, 6);
            ");
        DB::insert("insert into regions(id, region_name, country_id, type, latitude, longitude, zoom) values (11, 'Костанайская обл.', 1, 1, 51.4697, 63.9799, 6);
            ");
        DB::insert("insert into regions(id, region_name, country_id, type, latitude, longitude, zoom) values (12, 'Кызылординская обл.', 1, 1, 45.3425, 63.2988, 6);
            ");
        DB::insert("insert into regions(id, region_name, country_id, type, latitude, longitude, zoom) values (13, 'Мангистауская обл.', 1, 1, 44.2648, 53.7627, 6);
            ");
        DB::insert("insert into regions(id, region_name, country_id, type, latitude, longitude, zoom) values (14, 'Павлодарская обл.', 1, 1, 52.0809, 76.7461, 6);
            ");
        DB::insert("insert into regions(id, region_name, country_id, type, latitude, longitude, zoom) values (15, 'Северо-Казахстанская обл.', 1, 1, 54.4275, 68.6491, 7);
            ");
        DB::insert("insert into regions(id, region_name, country_id, type, latitude, longitude, zoom) values (16, 'Южно-Казахстанская обл.', 1, 1, 44.9498, 78.4223, 11);
            ");



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regions');
    }
}
