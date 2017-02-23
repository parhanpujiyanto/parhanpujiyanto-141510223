<?php

namespace App\Http\Middleware;

use Closure;

class keuangan
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
        if (auth()->check() && $request->user()->type_user=='admin') {
            return $next($request);
        }
        elseif (auth()->check() && $request->user()->type_user=='keuangan') {
            return $next($request);
        }
        else{
      
        return redirect()->guest('/akses');
       }
    }
}
