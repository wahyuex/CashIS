<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public function listobat()
    {
        return $this->belongsTo(Listobat::class);
    }
    // Contoh fillable properties pada model Cart
    // Contoh fillable properties pada model Cart
protected $fillable = ['id','code', 'name', 'harga', 'stock', 'kategori', 'satuan_id', 'quantity'];

}
