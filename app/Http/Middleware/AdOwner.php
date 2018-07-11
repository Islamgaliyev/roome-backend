<?php

namespace App\Http\Middleware;

use Closure;
use App\Ad;
use Auth;

class AdOwner
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
        $count = Ad::where('id', $request->route('ad_id'))
        ->where('user_id', Auth::user()->id)
        ->count();

        if($count > 0) return $next($request);


        return response()->json([
            'errors' => [
                'message' => 'Forbidden. Not an owner of advertisment!',
                'status_code' => 400
            ]
        ], 400);
    }
}
