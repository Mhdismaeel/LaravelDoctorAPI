<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UpdatePermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user=Auth::user();

        if($user->hasRole(['SuperAdmin','Admin']) )
        {
            if($user->hasAnyDirectPermission(['Can Update','Can Update Order']))
            {

                return $next($request);

            }

        }

        else
        {
            return response()->json('You dont have update permissions', 413);

        }    }
}
