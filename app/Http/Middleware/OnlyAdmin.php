<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnlyAdmin
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
        if ( Auth::guard('admin')->check() )
        {
            return $next($request);
        }
        else 
        {   
            // rest api requset
            if ( $request->expectsJson() ) 
            {
                return  response()->json(["message" => "Forbidden"], 403);
            }

            // user dashboard
            return redirect('/dashboard');
        }

    }
}
