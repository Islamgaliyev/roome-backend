<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainData extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'ad_id', 'room_amount', 'bathroom_amount', 'beds_amount', 'house_type', 'price', 'house_area',
    ];


    public function ad(){
    	return $this->belongsTo('App\Ad');
    }
}
