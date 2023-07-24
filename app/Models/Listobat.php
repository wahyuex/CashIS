<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listobat extends Model
{
    use HasFactory;
    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
