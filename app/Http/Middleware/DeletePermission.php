<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeletePermission
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
            if($user->hasAnyDirectPermission(['Can Delete','Can Delete Order']))
            {

                return $next($request);

            }

        }

        else
        {
            return response()->json('You dont have delete permissions', 413);

        }    }
}
