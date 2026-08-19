@extends('layouts.app')

@section('content')
<div class="container mt-4">

    {{-- 🌸 Judul Halaman --}}
    <h2 class="text-center mb-4" 
        style="font-family:'Poppins', sans-serif; font-weight:700; color:#4b0e0c;">
        ➕ Tambah Produk Baru 🍮
    </h2>

    {{-- Form Tambah Produk --}}
    <div class="card shadow-sm" style="border:none; border-radius:12px;">
        <div class="card-body" style="background-color:#fffdf9;">

            {{-- Pastikan action & method benar --}}
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Nama Produk --}}
                <div class="mb-3">
                    <label for="nama" class="form-label fw-semibold">Nama Produk</label>
                    <input type="text" name="nama" id="nama" class="form-control" 
                           placeholder="Masukkan nama produk..." required>
                </div>

                {{-- Deskripsi --}}
                <div class="mb-3">
                    <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control"
                              placeholder="Tuliskan deskripsi singkat..." required></textarea>
                </div>

                {{-- Harga --}}
                <div class="mb-3">
                    <label for="harga" class="form-label fw-semibold">Harga (Rp)</label>
                    <input type="number" name="harga" id="harga" class="form-control" 
                           placeholder="Contoh: 15000" required>
                </div>

                {{-- 🌿 Kategori --}}
                <div class="mb-3">
                    <label for="kategori" class="form-label fw-semibold">Kategori</label>
                    <select name="kategori" id="kategori" class="form-select" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Minuman">Minuman</option>
                        <option value="Makanan">Makanan</option>
                    </select>
                </div>

                {{-- Upload Gambar --}}
                <div class="mb-3">
                    <label for="gambar" class="form-label fw-semibold">Gambar Produk</label>
                    <input type="file" name="gambar" id="gambar" class="form-control" accept=".jpg,.jpeg,.png">
                    <small class="text-muted">Format: jpg, jpeg, png (maks. 2MB)</small>
                </div>

                {{-- Tombol Aksi --}}
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('product.index') }}" class="btn btn-secondary" 
                       style="background-color:#b76e79; border:none;">
                        ← Kembali
                    </a>
                    <button type="submit" class="btn btn-success px-4" 
                            style="background-color:#6b1b13; border:none;">
                        Simpan Produk
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
