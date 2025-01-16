<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\User;
use App\Models\Labor;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    // Menampilkan daftar laporan
    public function index()
    {
        $laporans = Laporan::with(['user', 'labor'])->get();
        return view('laporan.index', compact('laporans'));
    }

    // Menampilkan form untuk membuat laporan baru
    public function create()
    {
        $users = User::all();
        $labors = Labor::all();
        return view('laporan.create', compact('users', 'labors'));
    }

    // Menyimpan laporan baru
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'labor_id' => 'required|exists:labors,id',
            'description' => 'required|string|max:255',
        ]);

        Laporan::create($request->all());

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dibuat.');
    }

    // Menampilkan form untuk mengedit laporan
    public function edit(Laporan $laporan)
    {
        $users = User::all();
        $labors = Labor::all();
        return view('laporan.edit', compact('laporan', 'users', 'labors'));
    }

    // Memperbarui laporan yang sudah ada
    public function update(Request $request, Laporan $laporan)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'labor_id' => 'required|exists:labors,id',
            'description' => 'required|string|max:255',
        ]);

        $laporan->update($request->all());

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil diperbarui.');
    }

    // Menghapus laporan
    public function destroy(Laporan $laporan)
    {
        $laporan->delete();

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dihapus.');
    }

    // Menampilkan detail laporan
    public function show(Laporan $laporan)
    {
        return view('laporan.show', compact('laporan'));
    }
}
