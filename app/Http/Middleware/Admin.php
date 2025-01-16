<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Tambahkan namespace Auth
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Periksa apakah pengguna terautentikasi di guard 'admin'
        if (!Auth::guard('admin')->check()) {
            // Jika tidak, arahkan ke halaman login dengan pesan error
            return redirect()->route('login_form')->with('error', 'Please login first.');
        }

        // Lanjutkan ke request berikutnya jika lulus autentikasi
        return $next($request);
    }
}
