<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

use DB;

class Like extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'ad_id', 'user_id', 
    ];

    public static function likeAd($id){

    	$user = User::getUserId();

    	$check = DB::table('likes')
    	->where('likes.ad_id', $id)
    	->where('likes.user_id', $user)
    	->first();

    	if(!$check){

    		DB::table('ads')
    		->where('id', $id)
    		->increment('like_amount');

            Like::create([
             'ad_id' => $id,
             'user_id' => $user,
            ]);

    		return $ad['like'] = true;

    	} else {

    		DB::table('ads')
    		->where('id', $id)
    		->decrement('like_amount');

    		DB::table('likes')
    		->where('ad_id', $id)
    		->where('user_id', $user)
    		->delete();

    		return $ad['like'] = false;

    	}

    }

}
