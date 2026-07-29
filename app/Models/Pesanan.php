<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $fillable = [
        'kode_pesanan',
        'user_id',
        'layanan_id',
        'berat',
        'harga_per_kg',
        'total_harga',
        'status',
        'tanggal_masuk',
        'tanggal_selesai',
        'catatan',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    protected static function booted()
    {
        static::creating(function ($pesanan) {

            $jumlah = self::count() + 1;

            $pesanan->kode_pesanan =
                'LDY-' .
                now()->format('Ymd') .
                '-' .
                str_pad($jumlah, 3, '0', STR_PAD_LEFT);

        });
    }
}
