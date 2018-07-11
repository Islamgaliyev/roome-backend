<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Respond;

class RespondController extends ResponseController
{
    public function respondAd($ad_id){

    	return $this->respondRespondAd(Respond::respondAd($ad_id));

    }

    public function allResponds($ad_id){

    	return $this->respondAllResponds(Respond::allResponds($ad_id));

    }

    public function approveRespond($ad_id, $user_id){

    	return $this->respondApproveAd(Respond::approveRespond($ad_id, $user_id));
	}

	public function allApprovedAds(){

		return $this->respondAllApprovedAds(Respond::allApprovedAds());

	}
}
