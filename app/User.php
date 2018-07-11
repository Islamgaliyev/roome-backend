<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Auth;
use DB;


class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'role', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public static function getUserId(){

        if (auth('api')->user() !== NULL){
            $user_id = auth('api')->user()->id;
        } else {
            $user_id = 0;
        }

        return $user_id;
    }

    public static function getUserRole(){
        if (auth('api')->user() !== NULL){
            $user_role = auth('api')->user()->role;
        } else {
            $user_role = null;
        }

        return $user_role;
    }

    public static function getUserInfo(){

        $user_id = User::getUserId();
        $user_role = User::getUserRole();

        if ($user_role == 0) {

            $user_info = DB::table('users')
            ->select('users.id', 'arendator_infos.avatar_url', 'users.first_name',
                'users.last_name', 'users.role', 'users.email', 'arendator_infos.phone_number', 'arendator_infos.dob', 'arendator_infos.sex', 'arendator_infos.activity',
                'arendator_infos.family_status', 'arendator_infos.smoking')
            ->join('arendator_infos', 'users.id', '=', 'arendator_infos.user_id')
            ->where('users.id', '=', $user_id)
            ->get();

        } 
        
        if ($user_role == 1) {

            $user_info = DB::table('users')
            ->select('users.id', 'landlord_infos.avatar_url', 'users.first_name',
                'users.last_name', 'users.role', 'users.email', 'landlord_infos.phone_number', 'landlord_infos.dob', 'landlord_infos.sex')
            ->join('landlord_infos', 'users.id', '=', 'landlord_infos.user_id')
            ->where('users.id', '=', $user_id)
            ->get();
        }

        return $user_info;

    }
}
