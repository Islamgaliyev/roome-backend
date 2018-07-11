<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oauth_client extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'secret'
    ];
}
