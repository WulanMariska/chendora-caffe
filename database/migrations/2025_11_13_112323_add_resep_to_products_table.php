<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            // Tambahkan kolom hanya jika belum ada
            if (!Schema::hasColumn('products', 'resep')) {
                $table->text('resep')->nullable()->after('kategori');
            }
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            // Hapus kolom jika ada
            if (Schema::hasColumn('products', 'resep')) {
                $table->dropColumn('resep');
            }
        });
    }
};
