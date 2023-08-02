<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inreports', function (Blueprint $table) {
            $table->id();
            $table->string('tanggal');
            $table->string('kode_produk');
            $table->string('nama_produk');
            $table->string('jumlah_masuk');
            $table->string('harga_satuan');
            $table->string('pemasok');
            $table->string('total_harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inreports');
    }
};
