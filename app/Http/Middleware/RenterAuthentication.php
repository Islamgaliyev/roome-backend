<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RenterAuthentication
{
    /**
     * Handle an incoming request. 
     * Check for role of renter which should be 0
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {
        if(Auth::user()->role == 0) return $next($request);
        else return response()->json([
            'errors' => [
                'message' => 'Forbidden. Not a Renter!',
                'status_code' => 400
            ]
        ], 400);
    }

}
