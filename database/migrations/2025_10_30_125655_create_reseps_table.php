<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi tabel reseps.
     */
    public function up(): void
    {
        Schema::create('reseps', function (Blueprint $table) {
            $table->id();
            $table->string('nama_resep');     // 🍰 Nama resep, misal: "Es Cendol Spesial"
            $table->text('bahan');            // 🧂 Daftar bahan lengkap
            $table->text('langkah');          // 👩‍🍳 Langkah-langkah pembuatan
            $table->string('gambar')->nullable(); // 📸 Gambar opsional
            $table->timestamps();              // 🕒 created_at & updated_at
        });
    }

    /**
     * Balikkan migrasi (hapus tabel reseps).
     */
    public function down(): void
    {
        Schema::dropIfExists('reseps');
    }
};
