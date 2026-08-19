<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Pastikan user sudah login dan dia adalah admin
        if (! $request->user() || ! $request->user()->is_admin) {
            abort(403, 'Akses ditolak. Hanya admin yang boleh mengakses halaman ini.');
        }

        return $next($request);
    }
}
