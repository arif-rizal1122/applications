<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // setelah disini masuk ke kernel.php untuk mendaftarkan middleware yg dibuat
        // if(auth()->guest() || auth()->user()->username !== 'arif rizal'){
        //     abort(403);
        // }
        // 


        if(!auth()->guest() || !auth()->user()->is_admin){
            abort(403);
        }
        return $next($request);

    }
}
