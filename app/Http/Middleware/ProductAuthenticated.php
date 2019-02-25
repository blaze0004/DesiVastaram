<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ProductAuthenticated
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
           if(Auth::user()->role->name == 'Buyer'){
            return redirect('/dashboard')->with('error', "You are Not Allowed To Access");
        }
        return $next($request);
    }
}
