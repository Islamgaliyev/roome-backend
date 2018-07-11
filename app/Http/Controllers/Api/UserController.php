<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\User;

class UserController extends ResponseController
{
 	public function getUserInfo(){

 		return $this->respond(User::getUserInfo());

 	}   
}
