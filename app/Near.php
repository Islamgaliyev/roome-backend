<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Near extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'place_id', 'sport_complex', 'mart', 'grocer', 'hospital', 
        'school', 'pharmacy', 'playschool', 'univer', 
    ];

    public function place(){
    	return $this->belongsTo('App\Place');
    }
}
