<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;

    // 🧁 Nama tabel di database
    protected $table = 'reseps';

    // 🩷 Kolom yang bisa diisi lewat form
    protected $fillable = [
        'nama_resep',
        'bahan',
        'langkah',
        'gambar',
    ];
}
