<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inreports extends Model
{
    use HasFactory;
    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }
    protected $fillable = [
        'tanggal', // tambahkan kolom tanggal ke dalam properti fillable
        'kode_produk',
        'nama_produk',
        'jumlah_masuk',
        'satuan_id',
        'pemasok',
        'harga_satuan',
        'total_harga',
    ];
}

