<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Region;

class RegionController extends ResponseController
{
    public function show(){
    	
    	$regions = Region::getRegions();
    	
    	return $this->respond($regions);
    }
}
