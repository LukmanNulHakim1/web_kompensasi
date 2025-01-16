<?php

namespace App\Http\Controllers;

use App\Models\SlotWaktu;
use Illuminate\Http\Request;

class SlotWaktuController extends Controller
{
    public function index()
    {
        $slotWaktus = SlotWaktu::all();
        return view('slot_waktu.index', compact('slotWaktus'));
    }

    public function create()
    {
        return view('slot_waktu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'is_available' => 'required|boolean',
        ]);

        SlotWaktu::create($request->all());
        return redirect()->route('slot_waktu.index');
    }

    public function edit($id)
    {
        $slotWaktu = SlotWaktu::findOrFail($id);
        return view('slot_waktu.edit', compact('slotWaktu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'is_available' => 'required|boolean',
        ]);

        $slotWaktu = SlotWaktu::findOrFail($id);
        $slotWaktu->update($request->all());
        return redirect()->route('slot_waktu.index');
    }

    public function destroy($id)
    {
        $slotWaktu = SlotWaktu::findOrFail($id);
        $slotWaktu->delete();
        return redirect()->route('slot_waktu.index');
    }
}
