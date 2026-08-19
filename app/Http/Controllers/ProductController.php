<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // 🧁 Tampilkan semua produk
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('chendora.product.index', compact('products'));
    }

    // ➕ Form tambah produk
    public function create()
    {
        return view('chendora.product.create');
    }

    // 🍧 Simpan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'kategori' => 'required|string',
            'resep' => 'nullable|string', // ✅ TAMBAHAN
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $product = new Product();
        $product->nama = $request->nama;
        $product->deskripsi = $request->deskripsi;
        $product->harga = $request->harga;
        $product->kategori = $request->kategori;
        $product->resep = $request->resep; // ✅ TAMBAHAN

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads', $namaFile, 'public');
            $product->gambar = 'uploads/' . $namaFile;
        }

        $product->save();

        return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // ✏️ Edit produk
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('chendora.product.edit', compact('product'));
    }

    // ☕ Update produk
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'kategori' => 'required|string',
            'resep' => 'nullable|string', // ✅ TAMBAHAN
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $product->nama = $request->nama;
        $product->deskripsi = $request->deskripsi;
        $product->harga = $request->harga;
        $product->kategori = $request->kategori;
        $product->resep = $request->resep; // ✅ TAMBAHAN

        if ($request->hasFile('gambar')) {
            if ($product->gambar && Storage::disk('public')->exists($product->gambar)) {
                Storage::disk('public')->delete($product->gambar);
            }

            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads', $namaFile, 'public');
            $product->gambar = 'uploads/' . $namaFile;
        }

        $product->save();

        return redirect()->route('product.index')->with('success', 'Produk berhasil diperbarui!');
    }

    // 🗑️ Hapus produk
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->gambar && Storage::disk('public')->exists($product->gambar)) {
            Storage::disk('public')->delete($product->gambar);
        }

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus!');
    }
}
