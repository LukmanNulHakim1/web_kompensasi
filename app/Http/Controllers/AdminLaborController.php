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
        // Mengarah ke views/admin_labor/index.blade.php
        return view('admin_labor.index');
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

    public function logout()
    {
        Auth::guard('adminlabor')->logout();
        return redirect()->route('adminlabor.login_form');
    }
}
