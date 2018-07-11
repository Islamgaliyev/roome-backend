<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Region extends Model
{
	protected $fillable = [
		'region_name',
	];


	public static function getRegions(){

		$cities = DB::table('cities')
		->select('id', DB::raw('city_name as text'), 'city_name', 'latitude', 'longitude', 'zoom')
		->where('type', 1);

		$regions = DB::table('regions')
		->select('id', DB::raw('region_name as text'), 'region_name', 'latitude', 'longitude', 'zoom')
		->where('regions.id', '!=', 0)
		->unionAll($cities)
		->orderBy('id')
		->get();

		return $regions;
	}
}
