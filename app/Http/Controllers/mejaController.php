<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MejaController extends Controller
{
    public function index(): View
    {
        $mejas = Meja::latest()->paginate(10);
        return view('admin.meja', compact('mejas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kapasitas' => 'required|integer|min:1',
            'lokasi' => 'required|string|max:255',
            'tipe' => 'required|string',
            'status' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi' => 'nullable|string|max:500',
            'harga' => 'required|numeric|min:0',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('foto_meja', 'public');
        }

        Meja::create($validated);

        return redirect()->route('admin.meja')->with('success', 'Data meja ditambahkan.');
    }

    public function update(Request $request, Meja $meja)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kapasitas' => 'required|integer|min:1',
            'lokasi' => 'required|string|max:255',
            'tipe' => 'required|string',
            'status' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi' => 'nullable|string|max:500',
            'harga' => 'required|numeric|min:0',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('foto_meja', 'public');
        } else {
            $validated['foto'] = $meja->foto;
        }

        $meja->update($validated);

        return redirect()->route('admin.meja')->with('success', 'Data meja diperbarui.');
    }

    public function show($id)
    {
        $meja = Meja::findOrFail($id);
        $meja->status_label = Meja::$statusOptions[$meja->status] ?? $meja->status;

        if ($meja->foto && !str_starts_with($meja->foto, 'http')) {
            $meja->foto = asset('storage/' . $meja->foto);
        }

        return response()->json($meja);
    }
    public function publicView()
    {
        $exclusiveTables = Meja::where('tipe', 'exclusive')->where('status', 'tersedia')->get();
        $classicTables = Meja::where('tipe', 'classic')->where('status', 'tersedia')->get();

        return view('Public.lending_page', compact('exclusiveTables', 'classicTables'));
    }
    public function reservasi()
    {
        $exclusiveTables = Meja::where('tipe', 'exclusive')->get();
        $classicTables = Meja::where('tipe', 'classic')->get();
        return view('Public.reservasi', compact('exclusiveTables', 'classicTables'));
    }


    public function destroy($id): RedirectResponse
    {
        $meja = Meja::findOrFail($id);
        $meja->delete();

        return redirect()->route('admin.meja')->with('success', 'Data meja dihapus.');
    }

}
