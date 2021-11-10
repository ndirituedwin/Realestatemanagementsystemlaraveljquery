<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfAUTHENTICATEDD
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
        if ($request->session()->get('username') !=null) {
           return redirect()->route('home.beforerecords');
        }
            return $next($request);
    }
}
