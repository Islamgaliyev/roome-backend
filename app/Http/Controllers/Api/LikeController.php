<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Like;

class LikeController extends ResponseController
{
    public function likeAd($id){

		return $this->respondLikeAd(Like::likeAd($id));
	}
}
