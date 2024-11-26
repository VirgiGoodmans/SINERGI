<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Tangani permintaan yang masuk berdasarkan role pengguna.
     */
    public function handle($request, Closure $next, $role)
    {
        // Periksa apakah pengguna terautentikasi dan memiliki role yang sesuai
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request); // Lanjutkan ke permintaan berikutnya jika role cocok
        }

        // Abort jika akses tidak diizinkan
        abort(403, 'Unauthorized access');
    }
}
