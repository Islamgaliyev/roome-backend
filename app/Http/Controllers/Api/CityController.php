<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\City;

class CityController extends ResponseController
{
    public function show($region_id){
    	
    	$cities = City::getCities($region_id);

    	return $this->respond($cities);
    }
}
