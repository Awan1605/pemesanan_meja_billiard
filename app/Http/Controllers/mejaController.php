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

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kapasitas' => 'required|integer|min:1',
            'lokasi' => 'required|string|max:255',
            'status' => 'required|in:tersedia,terpesan,sedang digunakan,maintenance',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi' => 'nullable|string|max:500',
        ]);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('foto_meja', 'public');
            $validated['foto'] = $path; // Simpan tanpa "storage/"
        }

        Meja::create($validated);

        return redirect()->route('admin.meja')->with('success', 'Meja berhasil ditambahkan');
    }

    public function update(Request $request, Meja $meja): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kapasitas' => 'required|integer|min:1',
            'lokasi' => 'required|string|max:255',
            'status' => 'required|in:tersedia,terpesan,sedang digunakan,maintenance',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi' => 'nullable|string|max:500',
        ]);

        // Cek jika ada foto baru
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('foto_meja', 'public');
            $validated['foto'] = $path;
        } else {
            // Gunakan foto lama
            $validated['foto'] = $meja->foto;
        }

        $meja->update($validated);

        return redirect()->route('admin.meja')
            ->with('success', 'Meja berhasil diperbarui');
    }


    public function destroy($id): RedirectResponse
    {
        $meja = Meja::findOrFail($id);
        $meja->delete();

        return redirect()->route('admin.meja')->with('success', 'Meja berhasil dihapus');
    }

    public function show($id)
    {
        $meja = Meja::findOrFail($id);
        $meja->status_label = Meja::$statusOptions[$meja->status] ?? $meja->status;

        if ($meja->foto && !str_starts_with($meja->foto, 'http')) {
            $meja->foto = asset('storage/' . $meja->foto); // hasilnya: /storage/foto_meja/xxxx.jpg
        }

        return response()->json($meja);
    }

}
