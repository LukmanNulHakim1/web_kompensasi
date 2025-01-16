<?php

namespace App\Http\Controllers;

use App\Models\CreateAdminLabor;
use App\Models\Labor;
use App\Models\Admin;
use App\Models\AdminLabor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateAdminLaborController extends Controller
{
    public function index()
    {
        // Ambil data admin labors
        $adminLabors = AdminLabor::all();

        // Buat array dengan data yang diperlukan
        $data = $adminLabors->isEmpty() ? null : $adminLabors;

        return view('create_admin_labor.index', compact('data'));


    }

    public function create()
    {
        $labors = \App\Models\Labor::all(); // Mengambil semua data labor
        $admins = \App\Models\Admin::all(); // Mengambil semua data admin
        return view('create_admin_labor.create', compact('labors', 'admins'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admin_labors,email',
            'password' => 'required|string|min:8',
            'labor_id' => 'required|exists:labors,id',
            'admin_id' => 'required|exists:admins,id',
        ]);

        // Enkripsi password
        $validatedData['password'] = bcrypt($validatedData['password']);

        // Simpan data ke database
        AdminLabor::create($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('create_admin_labor.index')->with('success', 'Admin Labor created successfully!');
    }

    public function show($id)
    {
        $adminLabor = CreateAdminLabor::findOrFail($id);
        return view('create_admin_labor.show', compact('adminLabor'));
    }

    public function edit($id)
    {
        $adminLabor = CreateAdminLabor::findOrFail($id);
        $labors = Labor::all();  // Pastikan model Labor benar
        $admins = Admin::all();  // Pastikan model Admin benar

        return view('create_admin_labor.edit', compact('adminLabor', 'labors', 'admins'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admin_labors,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'labor_id' => 'required|exists:labors,id',
            'admin_id' => 'required|exists:admins,id',
        ]);

        $adminLabor = CreateAdminLabor::findOrFail($id);
        $adminLabor->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'] ? bcrypt($validated['password']) : $adminLabor->password,
            'labor_id' => $validated['labor_id'],
            'admin_id' => $validated['admin_id'],
        ]);

        return redirect()->route('admin_labor.index');
    }

    public function destroy($id)
    {
        $adminLabor = CreateAdminLabor::findOrFail($id);
        $adminLabor->delete();

        return redirect()->route('create_admin_labor.index')->with('success', 'Admin labor deleted successfully.');
    }
}
