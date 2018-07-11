<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('district_name')->nullable();
            $table->tinyInteger('city_id')->nullable();
            $table->tinyInteger('type')->nullable();
            $table->float('latitude', 12, 9)->nullable();
            $table->float('longitude', 12, 9)->nullable();
            $table->tinyInteger('zoom')->nullable();
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('cities');

        });


        DB::insert("insert into districts(id) values (0)");

        DB::insert("insert into districts(id, district_name, city_id, type, latitude, longitude, zoom)
         values (1, 'Алатауский район', 1, 3, 43.2813, 76.852, 13);");

        DB::insert("insert into districts(id, district_name, city_id, type, latitude, longitude, zoom)
         values (2, 'Алмалинский район', 1, 3, 43.2611, 76.8945, 13);");

        DB::insert("insert into districts(id, district_name, city_id, type, latitude, longitude, zoom)
         values (3, 'Ауэзовский район', 1, 3, 43.2409, 76.839, 13);");

        DB::insert("insert into districts(id, district_name, city_id, type, latitude, longitude, zoom)
         values (4, 'Бостандыкский район', 1, 3, 43.2134, 76.888, 13);
         ");

        DB::insert("insert into districts(id, district_name, city_id, type, latitude, longitude, zoom)
           values (5, 'Жетысуский район', 1, 3, 43.3011, 76.8983, 13);");

        DB::insert("insert into districts(id, district_name, city_id, type, latitude, longitude, zoom)
         values (6, 'Медеуский район', 1, 3, 43.2283, 76.9586, 13);");

        DB::insert("insert into districts(id, district_name, city_id, type, latitude, longitude, zoom)
           values (7, 'Наурызбайский район', 1, 3, 43.1892, 76.8169, 12);");

        DB::insert("insert into districts(id, district_name, city_id, type, latitude, longitude, zoom)
         values (8, 'Турксибский район', 1, 3, 43.3459, 76.9776, 13);");

        DB::insert("insert into districts(id, district_name, city_id, type, latitude, longitude, zoom)
         values (9, 'Есильский район', 2 , 3, 51.1227, 71.3665, 12);");

        DB::insert("insert into districts(id, district_name, city_id, type, latitude, longitude, zoom)
           values (10, 'Алматинский район', 2, 3, 51.1328, 71.51, 12);");

        DB::insert(" insert into districts(id, district_name, city_id, type, latitude, longitude, zoom)
         values (11, 'Сарыакринский район', 2, 3, 51.2063, 71.3869, 12);");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('districts');
    }
}
