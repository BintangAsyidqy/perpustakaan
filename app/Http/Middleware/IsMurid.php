<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsMurid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::user()->type == 'murid') {
            return $next($request);
        } else {
            return redirect()->route('dashboard')->with('failed', 'Guru tidak diperbolehkan mengakses halaman ini!');
        }

        return $next($request);
    }
}
