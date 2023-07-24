<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class outreports extends Model
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
        'jumlah_keluar',
        'satuan_id',
        'harga_satuan',
        'total_harga',
    ];
}
