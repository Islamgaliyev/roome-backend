<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use App\Respond;

class isAcceptedRenter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user_id = User::getUserId();
        $ad_id = $request->route('ad_id');        

        $check = Respond::where('user_id', $user_id)
        ->where('ad_id', $ad_id)
        ->where('status', 1)
        ->count();

        if($check > 0) return $next($request);


        return response()->json([
            'errors' => [
                'message' => 'You are not accepted.',
                'status_code' => 400
            ]
        ], 400);
    }
}
