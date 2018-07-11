<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

use DB;

class Respond extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'user_id', 'ad_id', 'status',
    ];

    public static function respondAd($ad_id){

    	$user_id = User::getUserId();

    	$check = DB::table('responds')
    	->where('ad_id', $ad_id)
    	->where('user_id', $user_id)
    	->first();

        if(!$check){

            Respond::create([
                'user_id' => $user_id,
                'ad_id' => $ad_id,
                'status' => 0
            ]);

            return $ad['status'] = 0;

        } else {

            return $ad['status'] = $check->status;
            
        }

    }

    public static function allResponds($ad_id){

    	$landlord_id = User::getUserId();

    	return DB::table('responds')
    	->select('users.id', 'users.first_name', 'users.last_name', 'arendator_infos.sex', 'arendator_infos.smoking', 'arendator_infos.dob', 'arendator_infos.avatar_url', 'users.email', 'responds.status', 'responds.created_at')
    	->join('users', 'responds.user_id', '=', 'users.id')
        ->join('arendator_infos', 'arendator_infos.user_id', '=', 'users.id')
    	->join('ads', 'responds.ad_id', '=', 'ads.id')
    	->where('ads.user_id', $landlord_id)
    	->where('responds.ad_id', $ad_id)
        ->orderBy('responds.updated_at', 'desc')
    	->get();

    }

    public static function approveRespond($ad_id, $user_id){

    	$approve = DB::table('responds')
    	->where('ad_id', $ad_id)
    	->where('user_id', $user_id)
    	->update(['status' => 1]);

    	if($approve){

    		return 1;
    	}

    	return -1;
    }

    public static function allApprovedAds(){

    	$renter_id = User::getUserId();

    	return DB::table('responds')
        ->select('ads.id', 'places.address', 'responds.status', 'main_datas.room_amount', 'main_datas.price', 'responds.updated_at',DB::raw('min(photos.photo_url) as photo_url'))
        ->join('ads', 'responds.ad_id', '=', 'ads.id')
        ->join('photos', 'ads.id', '=', 'photos.ad_id')
        ->join('places', 'places.ad_id', '=', 'ads.id')
        ->join('main_datas', 'ads.id', '=', 'main_datas.ad_id')
        ->groupBy('ads.id', 'places.address', 'responds.status', 'main_datas.room_amount', 'main_datas.price', 'responds.updated_at')
    	->where('responds.user_id', $renter_id)
        ->orderBy('responds.updated_at', 'desc')
    	->get();

    }
}
