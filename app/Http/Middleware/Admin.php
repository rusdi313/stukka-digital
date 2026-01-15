<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek jika user login DAN usertype == 'admin'
        if (Auth::check() && Auth::user()->usertype == 'admin') {
            return $next($request);
        }

        // Jika bukan admin, lempar ke dashboard user atau home
        return redirect('/dashboard')->with('error', 'Anda bukan Admin!');
    }
}