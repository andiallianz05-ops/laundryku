<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        // Cek apakah role user sesuai dengan role yang diminta route
        if (auth()->user()->role !== $role) {
            if (auth()->user()->role === 'admin') {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/seller/dashboard');
            }
        }

        return $next($request);
    }
}
