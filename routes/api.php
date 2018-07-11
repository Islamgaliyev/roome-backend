<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['middleware' => 'auth:api'], function(){

	/*
	|--------------------------------------------------------------------------
	| API Routes For Landlords and Renters
	|--------------------------------------------------------------------------
	|
	| Here is private property of Landlords and Renters. Authenticated users with role 1 and 0.
	|
	*/

	Route::post('/renter/info', 'Api\ArendatorInfoController@createRenterInfo');

	Route::post('/like/obj/{ad_id}', 'Api\LikeController@likeAd');

	Route::get('/user/info', 'Api\UserController@getUserInfo');

	


	/*
	|--------------------------------------------------------------------------
	| API Routes For Renters
	|--------------------------------------------------------------------------
	|
	| Here is private property of Renters. Authenticated users with role 0.
	|
	*/

	Route::group(['middleware' => 'renter'], function(){

		Route::post('/renter/respond/obj/{ad_id}', 'Api\RespondController@respondAd');

		Route::get('/renter/responds/all', 'Api\RespondController@allApprovedAds');

		Route::get('/renter/phone_of_landlord/{ad_id}', 'Api\LandlordInfoController@showPhone')->middleware('is_accepted_renter');

	});



	/*
	|--------------------------------------------------------------------------
	| API Routes For Landlords
	|--------------------------------------------------------------------------
	|
	| Here is private property of Landlords. Authenticated users with role 1.
	|
	*/
	Route::group(['middleware' => 'landlord'], function(){

		Route::get('/landlord/responds/{ad_id}', 'Api\RespondController@allResponds');

		Route::post('/obj/status/check', 'Api\AdController@checkStatus');

		Route::post('/obj', 'Api\AdController@create');

		Route::post('/obj/{ad_id}/{status}', 'Api\AdController@createStages')->middleware('ad_owner');

		Route::post('/landlord/respond/approve/{ad_id}/{user_id}', 'Api\RespondController@approveRespond')->middleware('ad_owner');

		Route::get('/landlord/obj/all', 'Api\AdController@allAds');

		Route::get('/landlord/obj/short_info/{ad_id}', 'Api\AdController@adShortInfo');

		Route::post('/landlord/info', 'Api\LandlordInfoController@createLandlordInfo');

	});

});

	/*
	|--------------------------------------------------------------------------
	| Public API Routes 
	|--------------------------------------------------------------------------
	|
	| Here is public property for all users.
	|
	*/


	Route::get('/obj/{ad_id}', 'Api\AdController@showAd');

	Route::post('/obj/search', 'Api\AdController@search');

	Route::post('/registration', 'Auth\RegisterController@registration');

    Route::get('/regions', 'Api\RegionController@show');

	Route::get('/cities/{region_id}', 'Api\CityController@show');