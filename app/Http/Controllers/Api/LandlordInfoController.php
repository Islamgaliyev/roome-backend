<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;

use App\LandlordInfo;

class LandlordInfoController extends ResponseController
{
    public function createLandlordInfo(Request $request){

    	$info = LandlordInfo::createLandlordInfo($request);

    	if($info[0] == 1)
    		return $this->respondCreated($info[1]);

    	return $this->respondError($info[1], 406);
    }

    public function showPhone($ad_id){

    	return $this->respond(LandlordInfo::showPhone($ad_id));

    }
}
