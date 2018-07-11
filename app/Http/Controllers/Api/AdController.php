<?php

namespace App\Http\Controllers\Api;

use App\Ad;
use App\MainData;
use App\Comfort;
use App\Place;
use App\Photo;
use App\Video;
use App\Near;
use App\Like;
use App\User;

use Illuminate\Http\Request;
use App\Validation\AdValidation;
use Illuminate\Pagination\Paginator;

class AdController extends ResponseController
{
	 /**
     * Add Ad and Main Data of Ad to ads and main_datas table
  	 *	   
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */

	 public function create(Request $request){

	 	//validate $request. Validation rules are in config/validation.php

	 	$v = AdValidation::validateZeroStage($request);


	 	if($v[0] == 1){
	 		$ad = Ad::create([
	 			'user_id' => User::getUserId(),
	 			'status' => 1,
	 			'like_amount' => 0,
	 		]);
	 		$request['ad_id'] = $ad->id;
	 		MainData::create($request->all());
	 		return $this->respondCreated($ad->id);
	 	} else if ($v[0] == 2) {
	 		$main_data = MainData::where('ad_id', $v[1])
	 		->update($request->all());
	 		return $this->respondCreated($v[1]);
	 	} else {
	 		return $this->respondInvalidAttribute($v);
	 	}
	 }

	 /**
     *  Add remaining data of Ad to comforts, places, nears, near_univers, 
  	 *  photos, videos tables	 
  	 *
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */

	 public function createStages(Request $request, $ad_id, $status){

	 	//add to $request ad_id attribute

	 	$request['ad_id'] = $ad_id;

	 	/*
		*  stage 1 - comforts
		*  stage 2 - places, nears, near_univers
		*  stage 3 - photos, videos
	 	*/ 

		if ($status == 1){

			$v = AdValidation::validateFirstStage($request);

			$place_data = $request->only(['ad_id','country_id', 'region_id', 'city_id', 'district_id', 'address', 'floor', 'total_floor', 'latitude', 'longitude']);
			if (is_null($place_data['region_id'])) {
				$place_data['region_id'] = 0;
			}


			$near_data = $request->except(['ad_id','country_id', 'region_id', 'city_id', 'district_id', 'address', 'floor', 'total_floor', 'latitude', 'longitude']);

			if($v == 1){
				$place = Place::create($place_data);

				$near_data['place_id'] = $place->id;

				Near::create($near_data);

				Ad::where('id', $ad_id)
				->update(['status' => 2]);
				return $this->respondCreated($ad_id);
			} else if($v == 2){
				$place = Place::where('ad_id', $ad_id)->first();
				$place->update($place_data);

				Near::where('place_id', $place->id)
				->update($near_data);


				return $this->respondCreated($ad_id);
			} else {
				return $this->respondInvalidAttribute($v);
			}

			// $request['place_id'] = $place->id;

			// Near::create($request->all());

			// if($request->get('univer') == true){

			// 	$univer_keys = $request->get('univer_keys');

			// 	for ($i=0; $i < count($univer_keys); $i++) { 
			// 		NearUniver::create([
			// 			'place_id' => $place->id,
			// 			'key' => $univer_keys[$i],
			// 		]);
			// 	}
			// }

			// Ad::where('id', $ad_id)
			// ->update(['status' => 3]);

			// return $this->respondCreated($ad_id);
			

		} else if($status == 2){

			$v = AdValidation::validateSecondStage($request);
			
			if($v == 1){
				Comfort::create($request->all());
				Ad::where('id', $ad_id)
				->update(['status' => 3]);
				return $this->respondCreated($ad_id);
			} else if($v == 2){
				Comfort::where('ad_id', $ad_id)
				->update($request->all());

				return $this->respondCreated($ad_id);
			} else {
				return $this->respondInvalidAttribute($v);
			}
			
		} else if($status == 3){

			$v = AdValidation::validateThirdStage($request);
			$photo_urls = $request->get('photo_urls');

			if($v == 1){
				for ($i=0; $i < count($photo_urls); $i++) { 
					Photo::create([
						'ad_id' => $ad_id,
						'photo_url' => $photo_urls[$i],
					]);
				}
				if ($request->exists('video_url')) {
					Video::create($request->all());
				}

				Ad::where('id', $ad_id)
				->update(['status' => 4]);

				return $this->respondCreated($ad_id);
			}
			return $this->respondInvalidAttribute($v);
		} 
		return $this->respondForbidden();
	}



	public function search(Request $request){
		
		return $this->respond(Ad::search([],$request));

	}

	public function showAd($id){

		return $this->respond(Ad::showAdById($id));

	}

	public function checkStatus(){

		return $this->respondCurrentStatus(Ad::currentStatus());
	}

	public function allAds(){

		return $this->respond(Ad::getAllAds());

	}

	public function adShortInfo($id){

		return $this->respond(Ad::shortInfo($id));

	}
}