<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsForbidden
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        
        if (Auth::user()->getRole() != $role) {
            return redirect()->back()->withErrors(['forbidden' => 'Anda tidak memiliki akses ke halaman tersebut']);
        }
        return $next($request);
    }
}
