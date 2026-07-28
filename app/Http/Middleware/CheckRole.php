<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Cek apakah user sudah login dan role-nya sesuai dengan yang diminta
        if ($request->user() && $request->user()->role === $role) {
            return $next($request);
        }

        // Jika tidak sesuai, lemparkan error 403 (Forbidden)
        abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    }
}