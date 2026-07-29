<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $fillable = [
        'nama_layanan',
        'harga_per_kg',
        'estimasi_waktu',
        'deskripsi',
    ];
    
    public function pesanans()
    {
        return $this->hasMany(Pesanan::class);
    }
}
