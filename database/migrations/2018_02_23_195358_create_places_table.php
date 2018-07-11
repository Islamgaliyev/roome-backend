<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ad_id')->unique()->index();
            $table->tinyInteger('country_id');
            $table->tinyInteger('region_id')->default(0);
            $table->tinyInteger('city_id');
            $table->tinyInteger('district_id')->default(0);
            $table->string('address');
            $table->tinyInteger('floor')->nullable();
            $table->tinyInteger('total_floor')->nullable();
            $table->float('latitude', 12, 9)->nullable();
            $table->float('longitude', 12, 9)->nullable();
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('region_id')->references('id')->on('regions');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('district_id')->references('id')->on('districts');
            $table->foreign('ad_id')->references('id')->on('ads');

        });


        $data = array(
            array('ad_id'=>1, 'country_id'=>1, 'region_id'=>0, 'city_id'=>2, 'district_id'=>9, 'address'=> 'Жинис 551', 'floor'=>4, 'total_floor'=>5, 'latitude' => 43.34124124124221, 'longitude' => 56.2132131231),
            array('ad_id'=>2, 'country_id'=>1, 'region_id'=>3, 'city_id'=>3, 'district_id'=>0, 'address'=> 'Абая 125', 'floor'=>2, 'total_floor'=>5, 'latitude' => 43.34124124124221, 'longitude' => 56.2132131231),
            array('ad_id'=>3, 'country_id'=>1, 'region_id'=>0, 'city_id'=>1, 'district_id'=>2, 'address'=> 'Тимирязева 56a', 'floor'=>1, 'total_floor'=>5, 'latitude' => 43.34124124124221, 'longitude' => 56.2132131231),
            array('ad_id'=>4, 'country_id'=>1, 'region_id'=>0, 'city_id'=>1, 'district_id'=>3, 'address'=> 'Фурманова 155', 'floor'=>1, 'total_floor'=>5, 'latitude' => 43.34124124124221, 'longitude' => 56.2132131231),
            array('ad_id'=>5, 'country_id'=>1, 'region_id'=>0, 'city_id'=>2, 'district_id'=>11, 'address'=> 'Кабанбай батыра 15', 'floor'=>4, 'total_floor'=>5, 'latitude' => 43.34124124124221, 'longitude' => 56.2132131231),
            array('ad_id'=>6, 'country_id'=>1, 'region_id'=>0, 'city_id'=>2, 'district_id'=>10, 'address'=> 'Наурызбай батыра 15', 'floor'=>4, 'total_floor'=>5, 'latitude' => 43.34124124124221, 'longitude' => 56.2132131231),
            array('ad_id'=>7, 'country_id'=>1, 'region_id'=>5, 'city_id'=>6, 'district_id'=>0, 'address'=> 'Абая 55', 'floor'=>5, 'total_floor'=>5, 'latitude' => 43.34124124124221, 'longitude' => 56.2132131231),
            array('ad_id'=>8, 'country_id'=>1, 'region_id'=>3, 'city_id'=>3, 'district_id'=>0, 'address'=> 'Абая 23', 'floor'=>4, 'total_floor'=>5, 'latitude' => 43.34124124124221, 'longitude' => 56.2132131231),
        );

        // DB::table('places')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
}
