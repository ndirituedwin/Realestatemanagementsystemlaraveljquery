<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Checkuser
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
        if($request->session()->get('username')===null && $request->session()->get('landlordcode')===null && $request->session()->get('loggedintenantcode')===null){
            return redirect('/signin');

        }
        return $next($request);
    }
}