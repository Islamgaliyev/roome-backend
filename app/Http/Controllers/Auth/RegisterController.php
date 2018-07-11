<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\ArendatorInfo;
use App\LandlordInfo;
use App\Oauth_client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\ResponseController;

class RegisterController extends ResponseController
{


    /**
     * The registration's data validation.
     *
     * This function checks all fields of registration requests.
     *
     */

    public function registration(Request $request){


        /**
         * The registration's data validation.
         *
         * This function checks all fields of registration requests.
         *
         */

        $v = validator($request->only('first_name', 'last_name', 'avatar_url', 'email', 'role', 'password'), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|integer',
            'password' => 'required|string|min:6',
        ]);

        if ($v->fails()) {
            return $this->respondError($v->errors()->first(), 400);
        }


        /**
         * Request's data to array structure
         */

        $data = request()->only('first_name', 'last_name', 'email', 'role', 'password');


        /**
         * Adding user to database
         */

        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => strtolower($data['email']),
            'role' => $data['role'],
            'password' => bcrypt($data['password']),
        ]);

        if ($user->role == 0) {
            ArendatorInfo::create([
            'user_id' => $user->id
            ]);   
        } else {
            LandlordInfo::create([
            'user_id' => $user->id
            ]); 
        }
        
        $client = Oauth_client::where('password_client', 1)->first();


        $request->request->add([
            'grant_type'    => 'password',
            'client_id'     => $client->id,
            'client_secret' => $client->secret,
            'username'      => $data['email'],
            'password'      => $data['password'],
            'scope'         => '*',
        ]);
        
        // Fire off the internal request. 
        $proxy = Request::create(
            'oauth/token',
            'POST'
        );

        return \Route::dispatch($proxy);
    }

}
