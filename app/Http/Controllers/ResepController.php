<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resep;
use Illuminate\Support\Facades\Storage;

class ResepController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // 🍮 Tampilkan semua resep
    public function index()
    {
        $reseps = Resep::orderBy('created_at', 'desc')->get();
        return view('chendora.resep.index', compact('reseps'));
    }

    // ➕ Form tambah resep
    public function create()
    {
        return view('chendora.resep.create');
    }

    // 💾 Simpan resep baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_resep' => 'required|string|max:255',
            'bahan' => 'required|string',
            'langkah' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads/resep', $namaFile, 'public');
            $data['gambar'] = 'uploads/resep/' . $namaFile;
        }

        Resep::create($data);
        return redirect()->route('resep.index')->with('success', 'Resep berhasil ditambahkan!');
    }

    // ✏️ Edit resep
    public function edit($id)
    {
        $resep = Resep::findOrFail($id);
        return view('chendora.resep.edit', compact('resep'));
    }

    // ☕ Update resep
    public function update(Request $request, $id)
    {
        $resep = Resep::findOrFail($id);

        $request->validate([
            'nama_resep' => 'required|string|max:255',
            'bahan' => 'required|string',
            'langkah' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            if ($resep->gambar && Storage::disk('public')->exists($resep->gambar)) {
                Storage::disk('public')->delete($resep->gambar);
            }
            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads/resep', $namaFile, 'public');
            $data['gambar'] = 'uploads/resep/' . $namaFile;
        }

        $resep->update($data);
        return redirect()->route('resep.index')->with('success', 'Resep berhasil diperbarui!');
    }

    // 🗑️ Hapus resep
    public function destroy($id)
    {
        $resep = Resep::findOrFail($id);

        if ($resep->gambar && Storage::disk('public')->exists($resep->gambar)) {
            Storage::disk('public')->delete($resep->gambar);
        }

        $resep->delete();
        return redirect()->route('resep.index')->with('success', 'Resep berhasil dihapus!');
    }
}
