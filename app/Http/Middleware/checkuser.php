<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class checkuser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()==false) {
            
            return redirect('/adminLogin')->with('error', 'Your account is inactive.');
        }

        // if (Auth::user()->role !== $role) {
        //     // Redirect if the user does not have the required role
        //     return redirect('/login')->with('error', 'You do not have permission to access this page.');
        // }

        return $next($request);
    }
}
