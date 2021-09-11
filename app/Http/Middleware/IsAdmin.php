<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facedes\Auth;

class IsAdmin
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
        //Pengecekan admin atau user
        if(Auth::user() && Auth::user()->roles == 'ADMIN')
        {
            return $next($request);
        }
        
        return redirect('/'); //jika bukan admin arahkan ke halaman utama
    }
}
