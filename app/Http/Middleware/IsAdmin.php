<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //condisian sebelum menamplkan viesw dia sudah login atau belum
        //guest() artinya belum login

        // gabungpake OR // kalau dia udah login atau dia bukan norman kasi abort
        if (auth()->guest() || !auth()->user()->is_admin) {
            abort(403);
        }

        // jika dia bukan saya norman 
        // if (auth()->user()->username !== 'NormanThiohir') {
        //     abort(403);
        // }

        return $next($request);
    }
}
