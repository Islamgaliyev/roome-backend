<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'ad_id', 'photo_url',
    ];


    public function ad(){
    	return $this->belongsTo('App\Ad');
    }
}
