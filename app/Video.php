<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
     	'ad_id', 'video_url',
     ];


     public function ad(){
    	return $this->belongsTo('App\Ad');
    }
}
