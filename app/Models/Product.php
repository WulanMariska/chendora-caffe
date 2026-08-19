<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; // pastikan nama tabel benar

    // 💖 Tambahkan kategori biar semua data (makanan & minuman) bisa disimpan
    protected $fillable = [
    'nama',
    'deskripsi',
    'harga',
    'kategori',
    'gambar',
    'resep', // ← WAJIB TAMBAH
];

}
