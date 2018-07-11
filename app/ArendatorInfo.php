<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Validation\UserInfoValidation;

class ArendatorInfo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'user_id', 'phone_number', 'dob', 'sex', 'activity', 'family_status', 'smoking','avatar_url'
    ];

    public static function createRenterInfo($request){
    	
        $request['user_id'] = User::getUserId();
        $user_role = User::getUserRole();
        $user_name = $request->only('first_name', 'last_name');


        if ($user_role == 0) {

            $renter_info = $request->only('phone_number', 'dob', 'sex','avatar_url', 'smoking','activity', 'family_status');

            $v = UserInfoValidation::validateRenterInfo($request);


            if($v == 1){

                User::where('id', $request->user_id)
                ->update($user_name);

                ArendatorInfo::where('user_id', $request->user_id)
                ->update($renter_info);

                return array(1, $request->user_id);
            } else {
                return array(0, $v);
            }
        }

        if ($user_role == 1) {

            $landlord_info = $request->only('phone_number', 'dob', 'sex','avatar_url');

            $v = UserInfoValidation::validateLandlordInfo($request);


            if($v == 1){

                User::where('id', $request->user_id)
                ->update($user_name);

                LandlordInfo::where('user_id', $request->user_id)
                ->update($landlord_info);

                return array(1, $request->user_id);
            } else {
                return array(0, $v);
            }
        }
    }
}
