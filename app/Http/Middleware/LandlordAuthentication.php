<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class LandlordAuthentication
{
    /**
     * Handle an incoming request. 
     * Check for role of landlord which should be 1
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {
        if(Auth::user()->role == 1) return $next($request);
        else return response()->json([
            'errors' => [
                'message' => 'Forbidden. Not a Landlord!',
                'status_code' => 400
            ]
        ], 400);
    }
}
