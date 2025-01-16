<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Tambahkan namespace Auth
use Symfony\Component\HttpFoundation\Response;

class AdminLabor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard('adminlabor')->check()) {
            // Jika tidak, arahkan ke halaman login dengan pesan error
            return redirect()->route('login_form')->with('error', 'Please login first.');
        }

        // Lanjutkan ke request berikutnya jika lulus autentikasi
        return $next($request);

    }
}
