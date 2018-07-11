<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'ad_id', 'country_id', 'region_id', 'city_id', 'district_id', 'house_num', 'postcode', 'longitude', 'latitude', 'address', 'floor', 'total_floor',
    ];


    public function ad(){
    	return $this->belongsTo('App\Ad');
    }

    public function near(){
    	return $this->hasOne('App\Near');
    }

    public function univers(){
    	return $this->hasMany('App\NearUniver');
    }
}
