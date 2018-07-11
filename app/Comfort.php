<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comfort extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'id', 'ad_id', 'home_phone', 'wifi', 'cupboard', 'plastic_win',
        'tv', 'washer', 'lift','kitchenware', 'iron', 'cabel_tv', 'parking_place', 'domofon', 'security', 'gate' , 'street_lighting',
        'fen', 'shower_cabin', 'bath', 'dryer', 'vac'
    ];


    public function ad(){
    	return $this->belongsTo('App\Ad');
    }
}
