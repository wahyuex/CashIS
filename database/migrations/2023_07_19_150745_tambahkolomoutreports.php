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
        // Schema::create('inreports', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('tanggal');
        //     $table->string('kode_produk');
        //     $table->string('nama_produk');
        //     $table->string('jumlah_masuk');
        //     $table->string('harga_satuan');
        //     $table->string('pemasok');
        //     $table->string('total_harga');
        //     $table->timestamps();
        // });
        Schema::table('outreports', function (Blueprint $table) {
            $table->string('satuan_obat')->after('harga_satuan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inreports', function (Blueprint $table) {
            $table->string('satuan_obat');
        });
    }
};
