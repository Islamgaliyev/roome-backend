<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Validation\UserInfoValidation;

use DB;

class LandlordInfo extends Model
{
     protected $fillable = [
    	'user_id', 'phone_number', 'dob', 'sex','avatar_url'
    ];

    public static function createLandlordInfo($request){

    	$user_name = $request->only('first_name', 'last_name');
        $user_info = $request->except('first_name', 'last_name');
        
    	$request['user_id'] = User::getUserId();
    	$v = UserInfoValidation::validateLandlordInfo($request);


    	if($v == 1){
    		
            User::where('id', $request->user_id)
            ->update($user_name);

    		LandlordInfo::where('user_id', $request->user_id)
    		->update($user_info);

    		return array(1, $request->user_id);
    	} else {
    		return array(0, $v);
    	}


    }

    public static function showPhone($ad_id){

        return DB::table('landlord_infos')
                ->select('phone_number')
                ->join('ads', 'ads.user_id', '=', 'landlord_infos.user_id')
                ->where('ads.id', '=', $ad_id)
                ->get();
 
    }
}
