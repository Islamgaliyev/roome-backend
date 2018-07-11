<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;

use App\ArendatorInfo;

class ArendatorInfoController extends ResponseController
{
    public function createRenterInfo(Request $request){

    	$info = ArendatorInfo::createRenterInfo($request);

    	if($info[0] == 1)
    		return $this->respondCreated($info[1]);

    	return $this->respondError($info[1], 406);
    }
}
