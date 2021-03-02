<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isLoginNow
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
       
        if(session("id")&&(url('login')==$request->url()||url('signup')==$request->url()||url('/')==$request->url()))
        {
             return back();
        }
        return $next($request);
    }
}
