<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsGuest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            // Diizinkan untuk mengakses remote terkait
            return $next($request);
        } else {
            $role = Auth::user()->role;
        
            if ($role == 'ps') {
                // Redirect ke homePs jika role adalah 'ps'
                return redirect()->route('homePs');
            } elseif ($role == 'admin') {
                // Redirect ke homeAdmin jika role adalah 'admin'
                return redirect()->route('home');
            } else {
                // Redirect ke halaman login dengan session failed jika role tidak sesuai
                return redirect()->route('login')->with('failed', 'Anda tidak memiliki akses yang sesuai.');
            }
        }
        
    }
}
