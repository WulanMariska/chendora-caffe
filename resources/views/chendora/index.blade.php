@extends('layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
<style>
body {
    background: linear-gradient(to bottom, #fff9f4, #f0dfc3, #d8a47f);
    font-family: 'Poppins', sans-serif;
    color: #3e2a1e;
}

/* Hero Section */
.hero {
    text-align: center;
    padding: 100px 20px;
    background-image: url('https://img.freepik.com/premium-photo/cendol-es-cendol-with-coconut-milk-brown-sugar-traditional-indonesian-drink_88242-363.jpg');
    background-size: cover;
    background-position: center;
    color: white;
    text-shadow: 0 2px 10px rgba(0,0,0,0.5);
}

.hero h1 {
    font-family: 'Playfair Display', serif;
    font-size: 3rem;
    margin-bottom: 10px;
}

.hero p {
    font-size: 1.1rem;
    font-weight: 500;
}

/* Menu Section */
.menu {
    text-align: center;
    padding: 60px 20px;
}

.menu h2 {
    font-family: 'Playfair Display', serif;
    color: #5b3b1a;
    margin-bottom: 30px;
}

.menu-items {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 25px;
}

.card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    width: 250px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}

.card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
}

.card-body {
    padding: 15px;
}

.card-body h5 {
    font-family: 'Playfair Display', serif;
    color: #5a3d2b;
}

.card-body p {
    font-size: 0.9rem;
}

/* Kategori badge */
.badge-kategori {
    display: inline-block;
    background-color: #8B5E3C;
    color: #fff;
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 500;
    margin-bottom: 8px;
}

/* Footer */
.footer {
    background: #4a2c1f;
    color: white;
    text-align: center;
    padding: 20px;
    font-size: 0.9rem;
}
</style>

<!-- Hero Section -->
<div class="hero">
    <h1>Selamat Datang di <b>Chendora Café</b> 🍧</h1>
    <p>Nikmati sensasi tradisional es cendol dengan nuansa café modern.</p>

    <!-- 🔥 Tombol Tambah Produk -->
    <button class="btn btn-light mt-3 fw-semibold" data-bs-toggle="modal" data-bs-target="#addProductModal">
        + Tambah Produk
    </button>
</div>

<!-- Menu Section -->
<div class="menu">
    <h2>Menu Andalan Kami</h2>

    @if(session('success'))
        <div class="alert alert-success text-center shadow-sm">{{ session('success') }}</div>
    @endif

    <div class="menu-items">
        @forelse($products as $p)
            <div class="card">
                <img src="{{ $p->gambar ? asset('storage/' . $p->gambar) : 'https://img.freepik.com/premium-photo/traditional-indonesian-drink-es-cendol-with-coconut-milk_88242-1179.jpg' }}" alt="{{ $p->nama }}">
                <div class="card-body">
                    <span class="badge-kategori">{{ $p->kategori ?? 'Tidak Diketahui' }}</span>
                    <h5>{{ $p->nama }}</h5>
                    <p>{{ $p->deskripsi }}</p>
                    <p class="fw-bold">Rp {{ number_format($p->harga, 0, ',', '.') }}</p>
                </div>
            </div>
        @empty
            <p class="text-muted">Belum ada produk yang ditambahkan.</p>
        @endforelse
    </div>
</div>

<!-- Modal Tambah Produk -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg rounded-4">
      <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header text-white" style="background-color:#8B5E3C;">
          <h5 class="modal-title fw-bold" id="addProductLabel">Tambah Produk Baru</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body bg-light">
          <div class="mb-3">
            <label class="form-label fw-semibold">Nama Produk</label>
            <input type="text" name="nama" class="form-control shadow-sm" required>
          </div>
          <div class="mb-3">
            <label class="form-label fw-semibold">Deskripsi</label>
            <textarea name="deskripsi" class="form-control shadow-sm" rows="3" required></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label fw-semibold">Harga</label>
            <input type="number" name="harga" class="form-control shadow-sm" required>
          </div>
          <div class="mb-3">
            <label class="form-label fw-semibold">Kategori</label>
            <select name="kategori" class="form-select shadow-sm" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="Minuman">Minuman</option>
                <option value="Makanan">Makanan</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label fw-semibold">Gambar Produk</label>
            <input type="file" name="gambar" class="form-control shadow-sm">
          </div>
        </div>
        <div class="modal-footer bg-light">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn text-white" style="background-color:#8B5E3C;">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Footer -->
<div class="footer">
    <p>© 2025 Chendora Café | Cita Rasa Tradisional dengan Sentuhan Modern</p>
</div>
@endsection
