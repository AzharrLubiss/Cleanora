<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;

class PelangganController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        $jumlahPesanan = Pesanan::where('user_id', $user->id)->count();

        $pesananTerbaru = Pesanan::where('user_id', $user->id)
            ->latest()
            ->first();

        return view('dashboard', compact(
            'user',
            'jumlahPesanan',
            'pesananTerbaru'
        ));
    }
}