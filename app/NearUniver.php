<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NearUniver extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'place_id', 'key',
    ];

    public function place(){
    	return $this->belongsTo('App\Place');
    }
    
}
