@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Tambah Produk Baru</h2>

    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Produk</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" required></textarea>
        </div>

        <!-- ⭐ RESEP (tambahan agar resep tersimpan) -->
        <div class="mb-3">
            <label for="resep" class="form-label">Resep</label>
            <textarea name="resep" id="resep" class="form-control" rows="4" placeholder="Masukkan resep produk"></textarea>
        </div>
        <!-- ⭐ END RESEP -->

        <div class="mb-3">
            <label for="harga" class="form-label">Harga (Rp)</label>
            <input type="number" name="harga" id="harga" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" name="kategori" id="kategori" class="form-control" required placeholder="Contoh: Minuman">
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Produk</label>
            <input type="file" name="gambar" id="gambar" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('product.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const inputHarga = document.querySelector('#harga');
    if (inputHarga) {
        inputHarga.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value) {
                e.target.value = new Intl.NumberFormat('id-ID').format(value);
            } else {
                e.target.value = '';
            }
        });

        const form = inputHarga.closest('form');
        if (form) {
            form.addEventListener('submit', function() {
                inputHarga.value = inputHarga.value.replace(/\./g, '');
            });
        }
    }
});
</script>

@endsection
