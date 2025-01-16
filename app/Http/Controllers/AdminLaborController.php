<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLaborController extends Controller
{
    public function index()
    {
        // Mengarah ke views/admin_labor/laboran_login.blade.php
        return view('admin_labor.laboran_login');
    }

    public function dashboard()
    {
        $totalUsers = \App\Models\User::count();
        $totalLabors = \App\Models\Labor::count();
        $jadwalAktif = \App\Models\JadwalBoking::where('status', 'confirmed')->count();
        $jadwalPending = \App\Models\JadwalBoking::where('status', 'pending')->count();

        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $bookingsPerMonth = \App\Models\JadwalBoking::selectRaw('MONTH(date) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count')
            ->toArray();

        return view('admin_labor.index', compact(
            'totalUsers',
            'totalLabors',
            'jadwalAktif',
            'jadwalPending',
            'months',
            'bookingsPerMonth'
        ));
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::guard('adminlabor')->attempt($request->only('email', 'password'))) {
            return redirect()->route('adminlabor.dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }

    public function profile()
    {
        // Logika untuk menampilkan halaman profil admin
        return view('admin_labor.profile'); // Gantilah dengan view yang sesuai
    }

    public function logout()
    {
        Auth::guard('adminlabor')->logout();
        return redirect()->route('adminlabor.login_form');
    }
}
