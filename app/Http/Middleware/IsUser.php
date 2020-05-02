<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class IsUser
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
        if(Auth::user()){
            if(Auth::user()->role=='user' ){
                return $next($request);
            }
            
            if(Auth::user()->role=='admin' )
            {
                return $next($request);
            }
            else 
            {
            return redirect('visiteur');
            }
        }
        return redirect ('/login');
    }
    
}
