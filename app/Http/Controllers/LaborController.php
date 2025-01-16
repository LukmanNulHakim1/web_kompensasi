<?php

namespace App\Http\Controllers;

use App\Models\Labor;
use Illuminate\Http\Request;

class LaborController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $labors = Labor::all(); // Mengambil semua data labor
        return view('labors.index', compact('labors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('labors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'description' => 'required|string',
            'facilities' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi foto
        ]);

        // Menyimpan data labor
        $labor = new Labor();
        $labor->name = $request->input('name');
        $labor->location = $request->input('location');
        $labor->capacity = $request->input('capacity');
        $labor->description = $request->input('description');
        $labor->facilities = $request->input('facilities');

        // Cek apakah foto ada, lalu simpan
        if ($request->hasFile('photo')) {
            // Menyimpan foto ke folder public/storage/images
            $path = $request->file('photo')->store('images', 'public');
            // Simpan path dengan format 'storage/images'
            $labor->photo = 'storage/' . $path;
        }

        // Simpan labor ke database
        $labor->save();

        return redirect()->route('labors.index')->with('success', 'Labor berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Labor $labor)
    {
        return view('labors.show', compact('labor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Labor $labor)
    {
        return view('labors.edit', compact('labor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Labor $labor)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'description' => 'required|string',
            'facilities' => 'required|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Periksa jika ada foto baru yang diupload
        if ($request->hasFile('photo')) {
            // Menyimpan foto baru
            $path = $request->file('photo')->store('images', 'public');
            $validated['photo'] = 'storage/' . $path;
        }

        // Update data labor
        $labor->update($validated);

        return redirect()->route('labors.index')->with('success', 'Labor berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Labor $labor)
    {
        // Hapus labor dari database
        $labor->delete();

        return redirect()->route('labors.index')->with('success', 'Labor berhasil dihapus.');
    }
}
