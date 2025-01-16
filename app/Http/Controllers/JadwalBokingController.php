<?php

namespace App\Http\Controllers;

use App\Models\JadwalBoking;
use Illuminate\Http\Request;

class JadwalBokingController extends Controller
{
    public function index()
    {
        $jadwalBokings = JadwalBoking::with(['user', 'labor', 'slotWaktu'])->get();
        return view('jadwal_boking.index', compact('jadwalBokings'));
    }

    public function create()
    {
        // Ambil data yang diperlukan untuk dropdown
        $users = \App\Models\User::all();
        $labors = \App\Models\Labor::all();
        $slotWaktus = \App\Models\SlotWaktu::all();

        // Kirim data ke tampilan
        return view('jadwal_boking.create', compact('users', 'labors', 'slotWaktus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'labor_id' => 'required|exists:labors,id',
            'slot_waktu_id' => 'required|exists:slot_waktus,id',
            'date' => 'required|date',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        JadwalBoking::create($request->all());
        return redirect()->route('jadwal_boking.index');
    }

    public function edit($id)
    {
        $users = \App\Models\User::all(); // Mengambil semua data user
        $labors = \App\Models\Labor::all(); // Mengambil semua data labor
        $slotWaktus = \App\Models\SlotWaktu::all(); // Mengambil semua data slot waktu
        $jadwalBoking = \App\Models\JadwalBoking::findOrFail($id); // Menemukan data jadwal boking berdasarkan id

        return view('jadwal_boking.edit', compact('jadwalBoking', 'users', 'labors', 'slotWaktus'));
    }

    public function show($id)
    {
        $jadwal = \App\Models\JadwalBoking::findOrFail($id);
        return view('jadwal_boking.show', compact('jadwal'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $jadwalBoking = JadwalBoking::findOrFail($id);
        $jadwalBoking->update($request->all());
        return redirect()->route('jadwal_boking.index');
    }

    public function destroy($id)
    {
        $jadwalBoking = JadwalBoking::findOrFail($id);
        $jadwalBoking->delete();
        return redirect()->route('jadwal_boking.index');
    }
}
