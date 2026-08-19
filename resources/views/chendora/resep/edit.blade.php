@extends('layouts.app')

@section('content')
<div class="container mt-4">

    {{-- 🌸 Judul Halaman --}}
    <h2 class="text-center mb-4" 
        style="font-family:'Poppins', sans-serif; font-weight:700; color:#4b0e0c;">
        ✏️ Edit Resep Chendora Café 🍮
    </h2>

    {{-- Form Edit Resep --}}
    <div class="card shadow-sm" style="border:none; border-radius:12px;">
        <div class="card-body" style="background-color:#fffdf9;">

            <form action="{{ route('resep.update', $resep->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Nama Resep --}}
                <div class="mb-3">
                    <label for="nama" class="form-label fw-semibold">Nama Resep</label>
                    <input type="text" name="nama" id="nama" class="form-control" 
                           value="{{ old('nama', $resep->nama) }}" required>
                </div>

                {{-- Deskripsi Resep --}}
                <div class="mb-3">
                    <label for="deskripsi" class="form-label fw-semibold">Deskripsi Resep</label>
                    <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control"
                              required>{{ old('deskripsi', $resep->deskripsi) }}</textarea>
                </div>

                {{-- Bahan-bahan --}}
                <div class="mb-3">
                    <label for="bahan" class="form-label fw-semibold">Bahan-bahan</label>
                    <textarea name="bahan" id="bahan" rows="3" class="form-control"
                              required>{{ old('bahan', $resep->bahan) }}</textarea>
                </div>

                {{-- Langkah-langkah --}}
                <div class="mb-3">
                    <label for="langkah" class="form-label fw-semibold">Langkah-langkah</label>
                    <textarea name="langkah" id="langkah" rows="4" class="form-control"
                              required>{{ old('langkah', $resep->langkah) }}</textarea>
                </div>

                {{-- Gambar (opsional) --}}
                <div class="mb-3">
                    <label for="gambar" class="form-label fw-semibold">Gambar Resep</label>
                    <input type="file" name="gambar" id="gambar" class="form-control">
                    @if($resep->gambar)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $resep->gambar) }}" alt="Gambar Resep"
                                 style="width: 120px; height: 120px; object-fit: cover; border-radius: 8px;">
                        </div>
                    @endif
                    <small class="text-muted">Format: jpg, jpeg, png (maks. 2MB)</small>
                </div>

                {{-- Tombol Aksi --}}
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('resep.index') }}" class="btn btn-secondary" 
                       style="background-color:#b76e79; border:none;">
                        ← Kembali
                    </a>
                    <button type="submit" class="btn btn-success px-4" 
                            style="background-color:#6b1b13; border:none;">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
