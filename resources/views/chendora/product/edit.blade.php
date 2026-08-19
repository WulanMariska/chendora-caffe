@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center" style="color:#4b0e0c;">✏️ Edit Produk</h2>

    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Produk</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $product->nama }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" required>{{ $product->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" id="harga" class="form-control" value="{{ $product->harga }}" required>
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" name="kategori" id="kategori" class="form-control" value="{{ $product->kategori }}" required>
        </div>

        <!-- ✅ TAMBAHAN RESEP -->
        <div class="mb-3">
            <label for="resep" class="form-label">Resep</label>
            <textarea name="resep" id="resep" class="form-control" rows="4">{{ $product->resep }}</textarea>
        </div>
        <!-- END TAMBAHAN -->

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Produk</label><br>
            @if($product->gambar)
                <img src="{{ asset('storage/' . $product->gambar) }}" width="120" class="rounded mb-2">
            @endif
            <input type="file" name="gambar" id="gambar" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary" style="background-color:#6a1b1a; border:none;">💾 Simpan Perubahan</button>
        <a href="{{ route('product.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
