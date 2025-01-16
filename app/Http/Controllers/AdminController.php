<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminLabor;

class AdminController extends Controller
{
    Public function index()
    {
        // Menampilkan halaman login admin
        return view('admin.admin_login');
    }




    public function dashboard()
    {
        // Menampilkan halaman dashboard admin
        return view('admin.index');
    }

    // Create Admin Labor Page
    public function createAdminLabor()
    {
        return view('admin.create_admin_labor.index'); // Pastikan ada view 'create_admin_labor'
    }

    // Create User Page
    public function createUser()
    {
        return view('admin.create_user'); // Pastikan ada view 'create_user'
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Cek kredensial
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            // Jika berhasil login, arahkan ke dashboard
            return redirect()->route('admin.dashboard')->with('success', 'Login successful!');
        } else {
            // Jika gagal login, kembalikan ke halaman login dengan error
            return back()->with('error', 'Invalid email or password.');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login_form')->with('success', 'Logged out successfully.');
    }
}
