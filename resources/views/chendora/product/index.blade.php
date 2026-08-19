@extends('layouts.app')

@section('content')
<div class="container mt-3 fade-page">

    {{-- 🌸 Judul di tengah --}}
    <h2 class="text-center mb-3"
        style="font-family: 'Poppins', sans-serif; font-weight: 700; color: #4b0e0c; letter-spacing: 0.5px;">
        🍽️ Daftar Menu <span style="color:#b22222;">Chendora Café</span> 🌿
    </h2>

    {{-- 🧃 Filter Kategori --}}
    <form method="GET" action="{{ route('product.index') }}" class="mb-3 text-end">
        <div class="d-flex justify-content-end align-items-center gap-2">
            <label for="kategori" class="fw-semibold" style="color:#4b0e0c;">Filter Kategori:</label>
            <select name="kategori" id="kategori" class="form-select w-auto"
                    style="border-color:#b76e79; color:#4b0e0c; font-weight:500;"
                    onchange="this.form.submit()">
                <option value="">Semua</option>
                <option value="Makanan" {{ request('kategori') == 'Makanan' ? 'selected' : '' }}>Makanan</option>
                <option value="Minuman" {{ request('kategori') == 'Minuman' ? 'selected' : '' }}>Minuman</option>
            </select>
        </div>
    </form>

    {{-- Tombol Tambah Produk --}}
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('product.create') }}" class="btn btn-success shadow-sm"
           style="background-color: #6b1b13; border: none; font-weight: 500; padding: 8px 16px; border-radius: 6px;">
            + Tambah Produk
        </a>
    </div>

    {{-- Alert Sukses --}}
    @if(session('success'))
        <div class="alert alert-success shadow-sm border-0 text-center fw-semibold" style="background-color:#d8f3dc;">
            {{ session('success') }}
        </div>
    @endif

    {{-- 🌿 Tabel Produk --}}
    <div class="table-responsive shadow-sm rounded-4" style="background-color: #fffdf9;">
        <table class="table table-bordered align-middle text-center mb-0"
               style="border-radius: 12px; overflow: hidden;">
            <thead style="background: linear-gradient(90deg, #bcd9b4 0%, #dbead1 100%); color: #333;">
                <tr style="font-weight:600;">
                    <th style="width: 5%;">No</th>
                    <th style="width: 15%;">Nama Produk</th>
                    <th style="width: 15%;">Kategori</th>
                    <th style="width: 30%;">Deskripsi</th>
                    <th style="width: 15%;">Harga</th>
                    <th style="width: 15%;">Gambar</th>
                    <th style="width: 20%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $index => $product)
                    <tr style="vertical-align: middle;">
                        <td>{{ $index + 1 }}</td>
                        <td style="font-weight: 500;">{{ $product->nama }}</td>
                        <td><span class="badge bg-warning text-dark">{{ $product->kategori }}</span></td>

                        {{-- ✨ Deskripsi bisa diklik (pakai modal muncul di luar tabel) --}}
                        <td>
                            <button type="button" class="btn btn-outline-secondary btn-sm"
                                    data-bs-toggle="modal" data-bs-target="#deskripsiModal{{ $product->id }}">
                                Lihat Deskripsi
                            </button>

                            <!-- Modal Deskripsi -->
                            <div class="modal fade" id="deskripsiModal{{ $product->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color:#6b1b13; color:white;">
                                            <h5 class="modal-title">Deskripsi Produk</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body" style="text-align: justify; color:#4b0e0c;">
                                            {{ $product->deskripsi }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>

                        {{-- 💰 Harga tampil dengan format 15.000 --}}
                        <td style="font-weight: 700; color:#4b0e0c; font-size:15px;">
                            Rp {{ number_format((int)$product->harga, 0, ',', '.') }}
                        </td>

                        <td>
                            @if($product->gambar)
                                <img src="{{ asset('storage/' . $product->gambar) }}" alt="Gambar Produk"
                                     style="width: 90px; height: 90px; object-fit: cover; border-radius: 8px;
                                            box-shadow: 0 2px 6px rgba(0,0,0,0.2);">
                            @else
                                <span class="text-muted fst-italic">Tidak ada gambar</span>
                            @endif
                        </td>

                        <td>
                            <a href="{{ route('product.edit', $product->id) }}"
                               class="btn btn-warning btn-sm px-3"
                               style="font-weight:500; border:none; background-color:#e3a008; color:white;">
                                Edit
                            </a>
                            <form action="{{ route('product.destroy', $product->id) }}"
                                  method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm px-3"
                                        style="font-weight:500; background-color:#a61b0f; border:none;"
                                        onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-muted py-4 fst-italic">Belum ada produk ditambahkan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- ✨ Efek Halus & Fade-in --}}
<style>
    table tbody tr:hover {
        background-color: #fff4ec;
        transition: 0.2s ease;
    }
    .fade-page {
        animation: fadePage 0.9s ease-in-out;
    }
    @keyframes fadePage {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection
