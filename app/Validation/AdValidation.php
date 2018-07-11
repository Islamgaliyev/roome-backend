<?php 

namespace App\Validation;

use App\Ad;

use Validator;
use Config;
use Auth;
use Illuminate\Http\Request;

class AdValidation{


	public static function validateZeroStage(Request $request){

		$current_ad = Ad::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->first();

		$zeroStepValidator = Validator::make($request->all(), Config::get('validation.zeroStepValidation'));

		if($zeroStepValidator->fails()) 
			return $zeroStepValidator->errors()->first();

		if ($current_ad == NULL || $current_ad->status == 4 || $current_ad->status == -1){
			//add new advertisment
			return array(1);
		} else {
			//update advertisment
			return array(2, $current_ad->id);
		}

	}

	public static function validateFirstStage(Request $request){

		$current_ad = Ad::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->first();

		$firstStepValidator = Validator::make($request->all(), Config::get('validation.firstStepValidation'));

		if($firstStepValidator->fails()) 
			return $firstStepValidator->errors()->first();

		if($current_ad->status == 1 || $current_ad->status == 4 || $current_ad->status == -1){
			return 1;
		} else {
			//update advertisment
			return 2;
		}

	}

	public static function validateSecondStage(Request $request){

		$current_ad = Ad::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->first();

		$secondStepValidator = Validator::make($request->all(), Config::get('validation.secondStepValidation'));

		if($secondStepValidator->fails()) 
			return $secondStepValidator->errors()->first();

		if($current_ad->status == 2 || $current_ad->status == 4 || $current_ad->status == -1){
			return 1;
		} else {
			//update advertisment
			return 2;
		}

	}

	public static function validateThirdStage(Request $request){
		$thirdStepValidator = Validator::make($request->all(), Config::get('validation.thirdStepValidation'));

		if ($thirdStepValidator->fails())
			return $thirdStepValidator->errors()->first();

		
		return 1;
		
	}	
}