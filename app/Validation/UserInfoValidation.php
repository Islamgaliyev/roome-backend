<?php

namespace App\Validation;

use App\User;
use App\ArendtorInfo;

use Validator;
use Config;
use Auth;
use Illuminate\Http\Request;

class UserInfoValidation{

	public static function validateRenterInfo(Request $request){

		$validator = Validator::make($request->all(), Config::get('validation.renterInfoValidation'));

		if($validator->fails())
			return $validator->errors()->first();

		return 1;

	}

	public static function validateLandlordInfo(Request $request){

		$validator = Validator::make($request->all(), Config::get('validation.landlordInfoValidation'));

		if($validator->fails())
			return $validator->errors()->first();

		return 1;

	}


}