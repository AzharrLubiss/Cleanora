<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $fillable = [
        'user_id',
        'layanan_id',
        'berat',
        'total_harga',
        'status',
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
