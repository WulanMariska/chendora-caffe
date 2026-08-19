@extends('layouts.app')

@section('content')
<div class="container mt-3 fade-page">

    {{-- 🌸 Judul di tengah --}}
    <h2 class="text-center mb-4"
        style="font-family: 'Poppins', sans-serif; font-weight:700; color:#4b0e0c;">
        🍰 Daftar Resep <span style="color:#b22222;">Chendora Café</span> 🌿
    </h2>

    {{-- Tombol Tambah Resep --}}
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('resep.create') }}" class="btn btn-success shadow-sm"
           style="background-color:#6b1b13; border:none; font-weight:500; padding:8px 16px; border-radius:6px;">
            + Tambah Resep
        </a>
    </div>

    {{-- Alert Sukses --}}
    @if(session('success'))
        <div class="alert alert-success text-center fw-semibold" style="background-color:#d8f3dc;">
            {{ session('success') }}
        </div>
    @endif

    {{-- 🌿 Tabel Daftar Resep --}}
    <div class="table-responsive shadow-sm rounded-4" style="background-color:#fffdf9;">
        <table class="table table-bordered align-middle text-center mb-0"
               style="border-radius:12px; overflow:hidden;">
            <thead style="background:linear-gradient(90deg, #bcd9b4 0%, #dbead1 100%); color:#333;">
                <tr style="font-weight:600;">
                    <th style="width:5%;">No</th>
                    <th style="width:20%;">Nama Resep</th>
                    <th style="width:30%;">Bahan</th>
                    <th style="width:15%;">Langkah</th>
                    <th style="width:15%;">Gambar</th>
                    <th style="width:15%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($reseps as $index => $resep)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $resep->nama_resep }}</td>
                        <td class="text-start">
                            <button class="btn btn-outline-secondary btn-sm"
                                data-bs-toggle="modal" data-bs-target="#bahanModal{{ $resep->id }}"
                                style="font-size:13px; color:#4b0e0c;">Lihat Bahan</button>

                            {{-- Modal Bahan --}}
                            <div class="modal fade" id="bahanModal{{ $resep->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content" style="border-radius:15px;">
                                        <div class="modal-header" style="background-color:#5a3d2b; color:white;">
                                            <h5 class="modal-title">Bahan Resep</h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body" style="background-color:#fffdf9; text-align:justify;">
                                            {{ $resep->bahan }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="text-start">
                            <button class="btn btn-outline-secondary btn-sm"
                                data-bs-toggle="modal" data-bs-target="#langkahModal{{ $resep->id }}"
                                style="font-size:13px; color:#4b0e0c;">Lihat Langkah</button>

                            {{-- Modal Langkah --}}
                            <div class="modal fade" id="langkahModal{{ $resep->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content" style="border-radius:15px;">
                                        <div class="modal-header" style="background-color:#5a3d2b; color:white;">
                                            <h5 class="modal-title">Langkah Pembuatan</h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body" style="background-color:#fffdf9; text-align:justify;">
                                            {{ $resep->langkah }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            @if($resep->gambar)
                                <img src="{{ asset('storage/' . $resep->gambar) }}" alt="Gambar Resep"
                                     style="width:80px; height:80px; object-fit:cover; border-radius:8px;">
                            @else
                                <span class="text-muted fst-italic">Tidak ada gambar</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('resep.edit', $resep->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('resep.destroy', $resep->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus resep ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-muted py-4 fst-italic">Belum ada resep ditambahkan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- ✨ Efek halus --}}
<style>
    table tbody tr:hover { background-color: #fff4ec; transition: 0.2s ease; }
    .fade-page { animation: fadePage 0.9s ease-in-out; }
    @keyframes fadePage { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
</style>
@endsection
