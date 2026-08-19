@extends('layouts.app')

@section('content')
<div class="container mt-5 fade-page text-center">

    {{-- 🌸 Judul --}}
    <h2 class="mb-3" 
        style="font-family:'Poppins',sans-serif; font-weight:700; color:#4b0e0c; letter-spacing:0.5px;">
        Tentang Sistem <span style="color:#b22222;">Chendora Café</span>
    </h2>

    {{-- ✨ Deskripsi --}}
    <div class="mx-auto" style="max-width:750px; color:#4b0e0c; font-size:16px; line-height:1.7;">
        <p>
            <strong>Chendora Café Admin System</strong> adalah sistem berbasis web yang dirancang 
            untuk membantu pengelola dalam mengatur data produk, resep, dan informasi café secara efisien.
        </p>
        <p>
            Website ini dibuat menggunakan <span class="fw-semibold" style="color:#6b1b13;">Laravel 9</span>, 
            dengan antarmuka modern bertema café berwarna 
            <span style="color:#b22222;">merah maroon</span> dan <span style="color:#d4af37;">emas</span>, 
            sehingga tampak hangat namun profesional.
        </p>
        <p>
            Sistem ini dikembangkan sebagai bagian dari proyek akademik oleh 
            <span class="fw-bold" style="color:#6b1b13;">Wulan Mariska</span>, 
            dengan tujuan mempermudah proses manajemen menu dan data Chendora Café.
        </p>
    </div>

    {{-- ✨ Gambar dekoratif opsional --}}
    <div class="mt-4">
        <img src="{{ asset('images/admin-coffee.png') }}" alt="Chendora Café Admin"
             class="rounded shadow-sm" width="380"
             style="border:2px solid #d4af37;">
    </div>

</div>

{{-- 🌸 Animasi Fade-in --}}
<style>
.fade-page {
    animation: fadePage 0.9s ease-in-out;
}
@keyframes fadePage {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>
@endsection
