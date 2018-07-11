<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class City extends Model
{
	protected $fillable = [
		'id', 'city_name',
	];

	public static function getCities($region_id){
		if ($region_id == 1) {

			$districts = DB::table('districts')
			->select('id', DB::raw('district_name as text'), 'district_name', 'latitude', 'longitude', 'zoom')
			->where('city_id', 1)
			->get();

			return $districts;

		} else if ($region_id == 2){

			$districts = DB::table('districts')
			->select('id', DB::raw('district_name as text'), 'district_name', 'latitude', 'longitude', 'zoom')
			->where('city_id', 2)
			->get();

			return $districts;

		} else {

			$cities = DB::table('cities')
			->select('id', DB::raw('city_name as text'),'city_name', 'is_big_city', 'latitude', 'longitude', 'zoom')
			->where('region_id', $region_id)
			->where('type', '!=', 1)
			->get();

			return $cities;
		}

	}
}
